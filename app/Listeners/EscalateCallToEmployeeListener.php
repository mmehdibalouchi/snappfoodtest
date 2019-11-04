<?php

namespace App\Listeners;

use App\Call;
use App\Events\EmployeeGotFree;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalateCallToEmployeeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EmployeeGotFree $event)
    {

        if($employee = Employee::getFreeEmployee()){
            $call = Call::where('status', 'INCOMING')->orderBy('id', 'ASC');
            $call->employee()->associate($employee);
            $call->status = "ANSWERING";
            $call->save();
        }
    }
}
