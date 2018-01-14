<?php

namespace App\Http\Controllers\Backend\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Booking\EloquentBookingRepository;
use Route;

/**
 * Class AdminBookingController
 */
class AdminBookingController extends Controller
{
	/**
	 * Booking Repository
	 * 
	 * @var object
	 */
	public $repository;

    /**
     * Create Success Message
     * 
     * @var string
     */
    protected $createSuccessMessage = "Booking Created Successfully!";

    /**
     * Edit Success Message
     * 
     * @var string
     */
    protected $editSuccessMessage = "Booking Edited Successfully!";

    /**
     * Delete Success Message
     * 
     * @var string
     */
    protected $deleteSuccessMessage = "Booking Deleted Successfully";

	/**
	 * __construct
	 * 
	 * @param EloquentBookingRepository $bookingRepository
	 */
	public function __construct(EloquentBookingRepository $bookingRepository)
	{
		$this->repository = $bookingRepository;
	}

    /**
     * Booking Listing 
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
     * Booking View
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
     * Booking View
     * 
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $booking = $this->repository->findOrThrowException($id);
        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $booking,
            'repository'    => $this->repository
        ]);
    }

    /**
     * Booking Update
     * 
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());
        
        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * Booking Update
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
            ->escapeColumns(['email', 'sort'])
            ->escapeColumns(['message', 'sort'])
            ->addColumn('date', function ($booking) {
                return date('m-d-Y', strtotime($booking->created_at));
            })
		    ->addColumn('actions', function ($booking) {
                return $booking->admin_action_buttons;
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
