<?php namespace App\Http\Controllers\Backend\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Booking\EloquentBookingNewRepository;
use Route;
use App\Repositories\VanType\EloquentVanTypeRepository;
use App\Models\VanType\VanTypeSetting;

/**
 * Class BookingController
 */
class BookingController extends Controller
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
    public function __construct()
    {
        $this->repository = new EloquentBookingNewRepository();
        $this->vanTypeRepository = new EloquentVanTypeRepository();
        $this->vanTypeSetting = new VanTypeSetting();
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
        $vanTypes = $this->vanTypeRepository->getAll()->pluck('type', 'id')->toArray();
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository' => $this->repository,
            'vanTypes' => $vanTypes
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

    /**
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $item = $this->repository->getById($id);
        return view($this->repository->setAdmin(true)->getModuleView('showView'))->with([
            'item'          => $item,
            'repository'    => $this->repository
        ]);
    }

    /**
     * @param $postCode
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getAddress($postCode)
    {
        $curl = curl_init();
        //$url = "https://pcls1.craftyclicks.co.uk/json/rapidaddress?postcode=EC4Y%200DZ&response=data_formatted&lines=2&sort=asc&key=5551e-ab7a1-02f0d-00bbc";
        $urlToSend = str_replace(' ', '%20', "https://pcls1.craftyclicks.co.uk/json/rapidaddress?postcode=".$postCode."&response=data_formatted&lines=2&sort=asc&key=5551e-ab7a1-02f0d-00bbc");

        curl_setopt_array($curl, array(
            CURLOPT_URL => $urlToSend,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response("false");
        }

        return response($response);
    }

    public function getVanSettings($vanTypeId, Request $request)
    {
        $services = $this->vanTypeSetting->where('van_type_id', $vanTypeId)->get()->pluck('title', 'id')->toArray();

        return response()->json($services);

    }
}
