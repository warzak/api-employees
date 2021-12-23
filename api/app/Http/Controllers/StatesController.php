<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function index()
    {
        return State::all();
    }

    public function cities(Request $request)
    {
        if ($request->get('state_id')) {
            $stateId = $request->get('state_id');
            return City::where('state_id', '=', $stateId)->get();
        }

        return City::all();
    }
}
