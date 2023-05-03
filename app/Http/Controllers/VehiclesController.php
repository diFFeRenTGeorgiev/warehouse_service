<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    public function showVehicles(){
        $allVehicles = DB::select("SELECT vehicles.*,models.* 
        FROM vehicles
        left join models on models.id = vehicles.model_id
        ");
        return view('vehicles',['vehicles' => $allVehicles]);
    }
}
