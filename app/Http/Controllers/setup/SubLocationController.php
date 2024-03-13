<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\location\CreateLocationRequest;
use App\Http\Requests\location\UpdateLocationRequest;
use App\Repositories\AdminUserRepository;
use App\Repositories\LocationRepository;
use App\Repositories\SubLocationRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserLocationDetailRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class SubLocationController extends Controller
{
    private $sublocationRepository, $roleRepository, $adminUserRepository, $locationRepository, $userLocationDetailRepository;
    public function __construct(
        RoleRepository $roleRepository,
        AdminUserRepository $adminUserRepository,
        SubLocationRepository $sublocationRepository,
        LocationRepository $locationRepository,
        UserLocationDetailRepository $userLocationDetailRepository

    ) {
        $this->roleRepository = $roleRepository;
        $this->sublocationRepository = $sublocationRepository;
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
    //     $locations = $this->sublocationRepository->getAllLocation();
    //     return view('master.location.index', compact('locations'));
        
    // }
    
    public function index(FormRequest $request = null)
    {
        $search = optional($request)->input('search');
        $search = '';
        $sublocations = $this->sublocationRepository->searchSubLocations($search);
        return view('master.sublocation.index', compact('sublocations', 'search'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = $this->locationRepository->getAllLocation();
        return view('master.sublocation.create', compact('locations'));
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

        $subLocationDetails = $request->only([
            'name',
            'description'
        ]);
        $userDetails['name'] = $userDetails['username'];
        unset($userDetails['username']);
        try {
            DB::beginTransaction();
            $user = $this->adminUserRepository->createUser($userDetails, 1);
            $sublocation = $this->sublocationRepository->createSubLocation($subLocationDetails);
            $userLocation = [
                'user_id' => $user->id,
                'location_id' => $request->only(['location_id'])['location_id'],
                'sub_location_id' => $sublocation->id

            ];
            $this->userLocationDetailRepository->createUserLocationDetail($userLocation);
            DB::commit();


            return redirect()->route('master.sublocation.index')->with('message', trans('app.Location.Location_created'));
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
        $sublocation = $this->sublocationRepository->getSubLocationById($id);
        $locations = $this->locationRepository->getAllLocation();
        return view('master.sublocation.edit', compact('sublocation', 'locations'));
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
            'description',
            'location_id'
        ]);
        $location = $this->sublocationRepository->getSubLocationById($id);
        try {
            DB::beginTransaction();
            $this->sublocationRepository->updateSubLocation($id, $locationDetails);
            $this->adminUserRepository->updateUser($location->user_id, $userDetails, 1);
            DB::commit();

            return redirect()->route('master.sublocation.index')->with('message', trans('app.location.location_updated'));
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

    public function getallsublocations($id)
    {
        try {
            DB::beginTransaction();
            $data = $this->sublocationRepository->getSubLocationByLocationId($id);
            DB::commit();
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    
}
