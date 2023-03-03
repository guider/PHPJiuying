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

        $kwailog = new KwaiLog();
        $kwailog->fill($request->query());
        $kwailog->fill(['raw-data' => $request->getContent()]);
        $kwailog->save();
    }
}
