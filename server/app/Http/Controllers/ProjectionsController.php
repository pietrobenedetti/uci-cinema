<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use Illuminate\Http\Request;

class ProjectionsController extends Controller
{
    public function list() {
        return Projection::all();
    }

    public function view($id) {
        $projection = Projection::find($id);
        return $projection;
    }

    public function filter($date) {
        $projection = Projection::where('date', '=', $date)->get();
        return $projection;
    }    
}
