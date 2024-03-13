<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\role\CreateRoleRequest;
use App\Http\Requests\role\UpdateRoleRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepository->getAllRoles();
        return view('setup.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $roleDetails = $request->only([
            'name',
            'description'
        ]);
        try {
            DB::beginTransaction();
            $this->roleRepository->createRole($roleDetails);
            DB::commit();

            return redirect()
                ->route('setup.role.index')
                ->with('message', trans('app.role.role_created'));
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
        $role = $this->roleRepository->getRoleById($id);

        return view('setup.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $roleDetails = $request->only([
            'name',
            'description'
        ]);
        try {
            DB::beginTransaction();
            $this->roleRepository->updateRole($id, $roleDetails);
            DB::commit();

            return redirect()
                ->route('setup.role.index')
                ->with('message', trans('app.role.role_updated'));
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
            $this->roleRepository->deleteRoleById($id);
            DB::commit();

            return redirect()
                ->route('admin.role.index')
                ->with('message', trans('app.role.role_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
