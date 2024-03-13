<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\location\CreateLocationRequest;
use App\Http\Requests\location\UpdateLocationRequest;
use App\Models\Location;
use App\Repositories\AdminUserRepository;
use App\Repositories\LocationRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserLocationDetailRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    private $locationRepository, $roleRepository, $adminUserRepository, $userLocationDetailRepository;
    public function __construct(
        RoleRepository $roleRepository,
        AdminUserRepository $adminUserRepository,
        LocationRepository $locationRepository,
        UserLocationDetailRepository $userLocationDetailRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->locationRepository = $locationRepository;
        $this->adminUserRepository = $adminUserRepository;
        $this->userLocationDetailRepository = $userLocationDetailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $locations = $this->locationRepository->getAllLocation();
    //     return view('master.location.index', compact('locations'));
        
    // }
    
    public function index(FormRequest $request = null)
    {
        $search = optional($request)->input('search');
        // $search = '';
        $locations = $this->locationRepository->searchLocations($search);
        return view('master.location.index', compact('locations', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLocationRequest $request)
    {
        $userDetails = $request->only([
            'email',
            'password',
            'phone',
            'username',
        ]);

        $locationDetails = $request->only([
            'name',
            'description'
        ]);
        $userDetails['name'] = $userDetails['username'];
        unset($userDetails['username']);
        try {
            DB::beginTransaction();
            $user = $this->adminUserRepository->createUser($userDetails, 1);
            $location = $this->locationRepository->createLocation($locationDetails);
            $userLocation = [
                'user_id' => $user->id,
                'location_id' => $location->id
            ];
            $this->userLocationDetailRepository->createUserLocationDetail($userLocation);
            DB::commit();


            return redirect()->route('master.location.index')->with('message', trans('app.Location.Location_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = $this->locationRepository->getLocationById($id);
        return view('master.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, $id)
    {
        $userDetails = array_filter($request->only([
            'email',
            'password',
            'phone',
            'username',
        ]));

        if(isset($userDetails['username'])) {
            $userDetails['name'] = $userDetails['username'];
            unset($userDetails['username']);
        }
        $locationDetails = $request->only([
            'name',
            'description'
        ]);
        $location = $this->locationRepository->getLocationById($id);
        try {
            DB::beginTransaction();
            $this->locationRepository->updateLocation($id, $locationDetails);
            $this->adminUserRepository->updateUser($location->user->id, $userDetails, 1);

            DB::commit();

            return redirect()->route('master.location.index')->with('message', trans('app.location.location_updated'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            // $this->adminLocationRepository->deleteLocationById($id);
            DB::commit();

            return redirect()->route('admin.Locations.index')->with('message', trans('app.Location.Location_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
