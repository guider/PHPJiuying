<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KwaiLog;

class KwaiController extends Controller
{
    //


    public function monitor(Request $request)
    {

        print_r($request->query('imei'));
        print_r($request->query());
        print_r($request->all());
        $kwailog = new KwaiLog($request->all());
        $kwailog->raw_data = json_encode($request->all());
//        print_r($kwailog->toArray());
        $kwailog->save();
    }
}
