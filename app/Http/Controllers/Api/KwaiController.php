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
        if ($kwailog->save()) {
            $callback = $request->query('callback');
            $eventid = $request->query('eventid');
            $timestamp = time();
            $callback_url = "https://k.kuaishou.com/rest/web/task/debug/track/activate?callback=$callback&event_type=$eventid&event_time=$timestamp";
            return redirect($callback_url);

//            return response()->json(['code' => 0, 'msg' => 'success']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'failed']);

        }

    }
}
