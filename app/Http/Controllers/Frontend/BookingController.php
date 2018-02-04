<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Repositories\Booking\EloquentBookingRepository;

/**
 * Class BookingController.
 */
class BookingController extends Controller
{

    public function __construct()
    {
        $this->bookingRepository = new EloquentBookingRepository();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function createBooking(Request $request)
    {
        $record = $this->bookingRepository->create($request->all());

        if($record)
        {
            return response()->json([
                'info' => 'success',
                'msg' => 'Booking Quote Successfully Submitted.'
            ]);
        }
        else
        {
            return response()->json([
                'info' => 'error',
                'msg' => 'Error in saving Booking Quote, Try again later.'
            ]);
        }
        return 'true';
    }
}
