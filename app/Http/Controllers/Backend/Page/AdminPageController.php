<?php

namespace App\Http\Controllers\Backend\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Page\EloquentPageRepository;

/**
 * Class AdminPageController
 */
class AdminPageController extends Controller
{
	/**
	 * Page Repository
	 * 
	 * @var object
	 */
	public $repository;

    /**
     * Create Success Message
     * 
     * @var string
     */
    protected $createSuccessMessage = "Page Created Successfully!";

    /**
     * Edit Success Message
     * 
     * @var string
     */
    protected $editSuccessMessage = "Page Edited Successfully!";

    /**
     * Delete Success Message
     * 
     * @var string
     */
    protected $deleteSuccessMessage = "Page Deleted Successfully";

	/**
	 * __construct
	 * 
	 * @param EloquentPageRepository $pageRepository
	 */
	public function __construct(EloquentPageRepository $pageRepository)
	{
		$this->repository = $pageRepository;
	}

    /**
     * Page Listing 
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view($this->repository->setAdmin(true)->getModuleView('listView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * Page View
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
     * Page View
     * 
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $page = $this->repository->findOrThrowException($id);

        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $page,
            'repository'    => $this->repository
        ]);
    }

    /**
     * Page Update
     * 
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());
        
        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * Page Update
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
		    ->escapeColumns(['name', 'sort'])
            ->escapeColumns(['username', 'sort'])
            ->escapeColumns(['title', 'sort'])
            ->addColumn('start_date', function ($page) {
                return date('m-d-Y', strtotime($page->start_date));
            })
		    ->escapeColumns(['start_date', 'sort'])
		    ->escapeColumns(['end_date', 'sort'])
		    ->addColumn('actions', function ($page) {
                return $page->admin_action_buttons;
            })
		    ->make(true);
    }
}
