<?php

namespace App\Http\Controllers\Backend\Access\Permission;

use App\Models\Access\Role\Role;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Http\Requests\Backend\Access\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Access\Role\ManageRoleRequest;
use App\Http\Requests\Backend\Access\Role\UpdateRoleRequest;
use App\Repositories\Backend\Access\Permission\PermissionRepository;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class PermissionController
 */
class PermissionController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @var PermissionRepository
     */
    protected $repository;

    /**
     * Construct
     * 
     * @param PermissionRepository $repository
     */
    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function index(ManageRoleRequest $request)
    {
        return view($this->repository->getModuleView('listView'))->with(['repository' => $this->repository]);
        //return view('backend.access.permission.index');
    }

    public function getTableData()
    {
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['name', 'sort'])
            ->escapeColumns(['display_name', 'sort'])
            ->addColumn('actions', function ($permission) {
                return $permission->admin_action_buttons;
            })
            ->make(true);

    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(ManageRoleRequest $request)
    {
        return view($this->repository->getModuleView('createView'))->with(['repository' => $this->repository]);
        //return view('backend.access.permissions.create');
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function store(StoreRoleRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route($this->repository->getActionRoute('listRoute'))->withFlashSuccess('Permission is Created Successfully !');
    }

    /**
     * @param Role              $role
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageRoleRequest $request)
    {
        $permission = $this->repository->findOrThrowException($id);

        return view($this->repository->getModuleView('editView'))->with([
            'item'          => $permission,
            'repository'    => $this->repository
        ]);
    }

    /**
     * @param Role              $role
     * @param UpdateRoleRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $status = $this->repository->update($id, $request->all());
        
        return redirect()->route($this->repository->getActionRoute('listRoute'))->withFlashSuccess('Permission is Edited Successfully !');
    }

    /**
     * @param Role              $role
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function destroy($id, ManageRoleRequest $request)
    {
        $status = $this->repository->destroy($id);
        
        return redirect()->route($this->repository->getActionRoute('listRoute'))->withFlashSuccess('Permission is Deleted Successfully !');
    }
}
