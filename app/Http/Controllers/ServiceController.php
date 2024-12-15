<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class ServiceController extends Controller
{
    public function index()
    {
        $calendars = Calendar::paginate(5);
        $i=1;
        
        foreach($calendars as $calendar){
            // $calendar->formatted_date =Carbon::createFromFormat('Y-m-d H:i:s', $calendar->start_date)->format('Y-m-d');
            $calendar->number = $i;
            $i = $i+1;
        }

        return view('service',compact('calendars'));

    }

    


};
