<?php

namespace App\Http\Controllers\Backend\QuoteSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\QuoteSetting\QuoteSetting;
use Route;

/**
 * Class SingleItemController
 */
class SingleItemController extends Controller
{
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
	 */
	public function __construct()
	{
		$this->quoteSetting = new QuoteSetting();
	}

    /**
     * Index Page
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $fetchSingleItemSetting = $this->quoteSetting->where('type', 'singleitem')->first();
        $settings               = isset($fetchSingleItemSetting->settings) ? json_decode($fetchSingleItemSetting->settings, true) : null;

        return view('backend.quotesetting.singleitem')->with([
            'model'     => $this->quoteSetting,
            'settings'  => $settings
        ]);
    }

}
