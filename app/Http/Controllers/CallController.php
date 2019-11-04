<?php

namespace App\Http\Controllers;

use App\Call;
use App\Director;
use App\Employee;
use App\Jobs\CallEscalating;
use App\Manager;
use App\Respondent;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function store(Request $request)
    {
        $call = (new Call(["phone" => $request->phone]))->save();
        $employee = null;
        if($employee = Employee::getFreeEmployee()){
            $call->employee()->associate($employee);
            $call->status = "ANSWERING";
            $call->save();
        }
    }
}
