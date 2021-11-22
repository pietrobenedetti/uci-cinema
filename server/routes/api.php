<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProjectionsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\TicketsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/movies", [MoviesController::class, "list"]);

Route::get("/movie/{id}", [MoviesController::class, "view"]);

Route::get("/projections", [ProjectionsController::class, "list"]);

Route::get("/projection/{id}", [ProjectionsController::class, "view"]);

Route::get("/reservations", [ReservationsController::class, "list"]);

Route::get("/reservation/{id}", [ReservationsController::class, "view"]);

Route::get("/room/{id}", [RoomsController::class, "view"]);

Route::get("/tickets", [TicketsController::class, "list"]);

Route::get("/ticket/{id}", [TicketsController::class, "view"]);

Route::post("/ticket/create", [TicketsController::class, "create"]);

Route::delete("/ticket/delete", [TicketsController::class, "delete"]);

Route::put("/ticket/modify", [TicketsController::class, "modify"]);
