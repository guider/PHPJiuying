<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KwaiLog;
use Illuminate\Support\Facades\Http;

class KwaiController extends Controller
{
    //


    public function monitor(Request $request)
    {

        $kwailog = new KwaiLog($request->all());
        $kwailog->raw_data = json_encode($request->all());
//        print_r($kwailog->toArray());
        if ($kwailog->save()) {
            $callback = $request->query('callback');
//            $event_id = $request->query('event_id');
            $timestamp = time();
//            $callback_url = "https://k.kuaishou.com/rest/web/task/debug/track/activate?callback=$callback&event_type=$event_id&event_time=$timestamp";
            $resp = Http::get($callback);
            return $resp;
//            return redirect($callback_url);

//            return response()->json(['code' => 0, 'msg' => 'success']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'failed']);

        }

    }
}
