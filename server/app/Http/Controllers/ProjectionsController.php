<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectionsController extends Controller
{
    public function list() {
        return Projection::all();
    }

    public function view($id) {
        $projection = Projection::find($id);
        return $projection;
    }

    public function filter($id) {
        Log::info($id);
        $projection = Projection::where('id', '=', $id)->first();
        return $projection;
    }

    public function create(Request $request){
        $newProjectionData = json_decode($request->getContent());
        $newProjection = new Projection();

        $newProjection->date = $newProjectionData->date;
        $newProjection->tre_d = $newProjectionData->tre_d;
        $newProjection->movie_id = $newProjectionData->movie_id;
        $newProjection->room_id = $newProjectionData->room_id;

        $newProjection->save();
        return $newProjection;

    }
}
