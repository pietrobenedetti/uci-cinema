<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function list() {
        return Reservation::all();
    }

    public function view($id) {
        $reservation = Reservation::find($id);
        return $reservation;
    }
}
