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
}
