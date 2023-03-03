<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KwaiLog;

class KwaiController extends Controller
{
    //


    public function monitor(Request $request)
    {

        print_r($request->query());
        print_r($request->query('imei'));
        $kwailog = new KwaiLog($request->query());

        $kwailog->raw_data = $request->getContent();
        print_r($kwailog->toArray());
        $kwailog->save();
    }
}
