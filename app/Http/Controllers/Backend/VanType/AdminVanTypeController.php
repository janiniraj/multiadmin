<?php

namespace App\Http\Controllers\Backend\VanType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\VanType\EloquentVanTypeRepository;
use Route;

/**
 * Class AdminVanTypeController
 */
class AdminVanTypeController extends Controller
{
	/**
	 * VanType Repository
	 * 
	 * @var object
	 */
	public $repository;

    /**
     * Create Success Message
     * 
     * @var string
     */
    protected $createSuccessMessage = "Van Type Created Successfully!";

    /**
     * Edit Success Message
     * 
     * @var string
     */
    protected $editSuccessMessage = "Van Type Edited Successfully!";

    /**
     * Delete Success Message
     * 
     * @var string
     */
    protected $deleteSuccessMessage = "Van Type Deleted Successfully";

	/**
	 * __construct
	 * 
	 * @param EloquentVanTypeRepository $vanTypeRepository
	 */
	public function __construct(EloquentVanTypeRepository $vanTypeRepository)
	{
		$this->repository = $vanTypeRepository;
	}

    /**
     * VanType Listing 
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //dd(Route::getRoutes());
        return view($this->repository->setAdmin(true)->getModuleView('listView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * VanType View
     * 
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * Store View
     * 
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->createSuccessMessage);
    }

    /**
     * VanType View
     * 
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $vanType = $this->repository->findOrThrowException($id);
        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $vanType,
            'repository'    => $this->repository
        ]);
    }

    /**
     * VanType Update
     * 
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * VanType Update
     * 
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $status = $this->repository->destroy($id);
        
        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->deleteSuccessMessage);
    }

  	/**
     * Get Table Data
     *
     * @return json|mixed
     */
    public function getTableData()
    {
     	return Datatables::of($this->repository->getForDataTable())
		    ->escapeColumns(['type', 'sort'])
            ->addColumn('date', function ($vanType) {
                return date('m-d-Y', strtotime($vanType->created_at));
            })
		    ->addColumn('actions', function ($vanType) {
                return $vanType->admin_action_buttons;
            })
		    ->make(true);
    }

    public function show($id)
    {
        $item = $this->repository->getById($id);
        return view($this->repository->setAdmin(true)->getModuleView('showView'))->with([
            'item'          => $item,
            'repository'    => $this->repository
        ]);
    }
}
