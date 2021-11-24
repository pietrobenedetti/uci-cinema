<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function view($id) {
        $room = Room::find($id);
        return $room;
    }

    public function index(){
        $room = Room::all();
        return $room;
    }
}
