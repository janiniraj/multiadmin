<?php

namespace App\Http\Controllers\Backend\QuoteSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\QuoteSetting\QuoteSetting;
use Route;
use Session;

/**
 * Class SingleItemController
 */
class SingleItemController extends Controller
{
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
        $siteId                 = Session::get('siteId');
        $fetchSingleItemSetting = $this->quoteSetting->where([
            'type'      => 'singleitem',
            'site_id'   => $siteId
        ])->first();
        $settings               = isset($fetchSingleItemSetting->settings) ? json_decode($fetchSingleItemSetting->settings, true) : null;

        return view('backend.quotesetting.singleitem')->with([
            'model'     => $this->quoteSetting,
            'settings'  => $settings
        ]);
    }

    public function saveData(Request $request)
    {
        $input  = $request->all();
        $siteId = Session::get('siteId');

        unset($input['_token']);

        $check = $this->quoteSetting->where([
            'type'      => 'singleitem',
            'site_id'   => $siteId
        ])->first();

        $rules = array_values($input['distance']['rules']);
        foreach($rules as $key => $value)
        {
            $rules[$key]['is_fixed'] = isset($value['is_fixed']) ? $value['is_fixed'] : 0;
        }

        $input['distance']['rules'] = $rules;

        if($check)
        {
            $this->quoteSetting->where('id' , $check->id)->update([
                'settings'  => json_encode($input)
            ]);

            return redirect()->route('admin.quotesetting.singleitem.get')->withFlashSuccess('Settings updated Successfully.');
        }
        else
        {
            $this->quoteSetting->insert([
                'site_id'   => $siteId,
                'type'      => 'singleitem',
                'settings'  => json_encode($input)
            ]);

            return redirect()->route('admin.quotesetting.singleitem.get')->withFlashSuccess('Settings Saved Successfully.');
        }

        return redirect()->route('admin.quotesetting.singleitem.get')->withFlashError('Error in saving Settings');
    }

}
