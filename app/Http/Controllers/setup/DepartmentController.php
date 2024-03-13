<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\CreateDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Models\User;
use App\Repositories\AdminUserRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\RoleRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    private $departmentRepository, $roleRepository, $adminUserRepository, $DepartmentRepository;
    public function __construct(
        RoleRepository $roleRepository,
        AdminUserRepository $adminUserRepository,
        DepartmentRepository $departmentRepository,
        DepartmentRepository $DepartmentRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->departmentRepository = $departmentRepository;
        $this->DepartmentRepository = $DepartmentRepository;
        $this->adminUserRepository = $adminUserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $Departments = $this->departmentRepository->getAllDepartment();
    //     return view('master.Department.index', compact('Departments'));
        
    // }
    
    public function index(FormRequest $request = null)
    {
        $search = optional($request)->input('search');
        $search = '';
        $departments = $this->departmentRepository->searchdepartments($search);
        return view('master.department.index', compact('departments'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('master.department.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $departmentDetails = $request->only([
            'name',
            'user_id',
            'description'
        ]);
        try {
            DB::beginTransaction();
            $this->departmentRepository->createdepartment($departmentDetails);
            DB::commit();


            return redirect()->route('master.department.index')->with('message', trans('app.Department.Department_created'));
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
        $users = User::all();
        $department = $this->departmentRepository->getdepartmentById($id);
        return view('master.department.edit', compact('department', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $departmentDetails = $request->only([
            'name',
            'user_id',
            'description'
        ]);
        try {
            DB::beginTransaction();
            $this->departmentRepository->updatedepartment($id, $departmentDetails);
            DB::commit();

            return redirect()->route('master.department.index')->with('message', trans('app.Department.Department_updated'));
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
            // $this->adminDepartmentRepository->deleteDepartmentById($id);
            DB::commit();

            return redirect()->route('admin.Departments.index')->with('message', trans('app.Department.Department_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
