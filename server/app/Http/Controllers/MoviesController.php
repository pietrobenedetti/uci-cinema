<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function list() {
        return Movie::all();
    }

    public function view($id) {
        $movie = Movie::find($id);
        return $movie;
    }
}
