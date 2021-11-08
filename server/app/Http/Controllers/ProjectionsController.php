<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use Illuminate\Http\Request;

class ProjectionsController extends Controller
{
    public function list() {
        return Projection::all();
    }
}
