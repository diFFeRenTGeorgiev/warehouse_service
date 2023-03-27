<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    public function showVehicles(){
        $allVehicles = DB::select("SELECT vehicles.*,models.*,parts.* 
        FROM vehicles
        left join models on models.id = vehicles.model_id
        left join parts on parts.model_id = models.id");

        return view('vehicles',['vehicles1' => $allVehicles[0],'vehicles2' => $allVehicles[1]]);
    }
}
