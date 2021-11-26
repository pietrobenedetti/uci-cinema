<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function list() {
        return Movie::orderBy('id', 'desc')->get();
    }

    public function view($id) {
        $movie = Movie::find($id);
        return $movie;
    }

    public function create(Request $request){
        $newMovieData = json_decode($request->getContent());
        $newMovie = new Movie();

        $newMovie->title = $newMovieData->title;
        $newMovie->year = $newMovieData->year;
        $newMovie->duration = $newMovieData->duration;
        $newMovie->img = $newMovieData->img;
        $newMovie->director = $newMovieData->director;
        $newMovie->director_img = $newMovieData->director_img;
        $newMovie->rated = $newMovieData->rated;
        $newMovie->description = $newMovieData->description;
        $newMovie->description_long = $newMovieData->description_long;

        $newMovie->save();
        return $newMovie;
    }

    public function modify(Request $request, $id) {
        $movie = Movie::find($id);
        $newMovieData = json_decode($request->getContent());

        $movie->title = $newMovieData->title;
        $movie->year = $newMovieData->year;
        $movie->duration = $newMovieData->duration;
        $movie->img = $newMovieData->img;
        $movie->director = $newMovieData->director;
        $movie->director_img = $newMovieData->director_img;
        $movie->rated = $newMovieData->rated;
        $movie->description = $newMovieData->description;
        $movie->description_long = $newMovieData->description_long;

        $movie->save();
        return $movie;
    }

    public function delete(Request $request, $id) {
        $movie = Movie::where("id", $id)->delete();
        return $movie;
    }
}
