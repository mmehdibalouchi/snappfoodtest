<?php

namespace App\Http\Controllers;

use App\Call;
use App\Events\EmployeeGotFree;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function callFinished(Request $request)
    {
        $call = Call::find($request->call_id);
        if($call)
        {
            $call->status = "DONE";
            $call->employee->status = "FREE";
            $call->employee->save();
            $call->save();
        }
        event(new EmployeeGotFree());
    }
}
