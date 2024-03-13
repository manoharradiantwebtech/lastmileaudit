<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\user\CreateUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Repositories\AdminUserRepository;
use App\Repositories\LocationRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SubLocationRepository;
use App\Repositories\UserLocationDetailRepository;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $adminUserRepository, $roleRepository, $sublocationRepository, $userLocationDetailRepository, $locationRepository;
    public function __construct(
        AdminUserRepository $adminUserRepository,
        RoleRepository $roleRepository,
        SubLocationRepository $sublocationRepository,
        LocationRepository $locationRepository,
        UserLocationDetailRepository $userLocationDetailRepository
    ) {
        $this->adminUserRepository = $adminUserRepository;
        $this->roleRepository = $roleRepository;
        $this->sublocationRepository = $sublocationRepository;
        $this->locationRepository = $locationRepository;
        $this->userLocationDetailRepository = $userLocationDetailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepository->getAllRoles();
        $users = $this->adminUserRepository->getAllUsers();
        return view('master.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->getAllRoles();
        $locations = $this->locationRepository->getAllLocation();
        return view('master.user.create', compact('roles', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $userDetails = $request->only([
            'name',
            'email',
            'password',
            'phone',
            'doj'
        ]);
        $roleId = $request->input('role');
        $userlocdetails = $request->only(['location_id', 'sub_location_id']);
        try {
            DB::beginTransaction();
            $user = $this->adminUserRepository->createUser($userDetails, $roleId);
            $userlocdetails['user_id'] = $user->id;
            $this->userLocationDetailRepository->createUserLocationDetail($userlocdetails);
            DB::commit();

            return redirect()->route('master.user.index')->with('message', trans('app.user.user_created'));
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
        $user = $this->adminUserRepository->getUserById($id);
        $roles = $this->roleRepository->getAllRoles();
        $userRole = $user->roles->first();
        $locations = $this->locationRepository->getAllLocation();
        return view('master.user.edit', compact('user', 'roles', 'userRole', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $userDetails = $request->only([
            'name',
            'email',
            'phone',
            'status',
        ]);
        $roleId = $request->input('role');
        try {
            DB::beginTransaction();
            $this->adminUserRepository->updateUser($id, $userDetails, $roleId);
            DB::commit();

            return redirect()->route('master.user.index')->with('message', trans('app.user.user_updated'));
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
            $this->adminUserRepository->deleteUserById($id);
            DB::commit();

            return redirect()->route('admin.users.index')->with('message', trans('app.user.user_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function logout(HttpRequest $request): RedirectResponse
    {
        auth()->guard('web')->logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }

    public function loginview()
    {
        return view('login');
    }

        /**
     * Handling login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->attempt($credentials, $remember_me)) {
            // User is inactive
            // dd(auth()->user()->status);
            // if (auth()->user()->status == 0) {
            //     // Logout User
            //     auth()->guard('web')->logout();
            //     $request->session()->invalidate();

            //     return redirect('login')->with('error', trans('app.auth.login.inactive_access'));
            // }

            $request->session()->regenerate();

            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', trans('app.auth.login.invalid_login_detail'))->withInput();
        }
    }
}
