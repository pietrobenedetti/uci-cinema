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

Route::get("/reservations", [ReservationsController::class, "list"]);

Route::get("/rooms", [RoomsController::class, "list"]);

Route::get("/tickets", [TicketsController::class, "list"]);

Route::post("/ticket/create", [TicketsController::class, "create"]);

Route::delete("/ticket/delete", [TicketsController::class, "delete"]);

Route::put("/ticket/modify", [TicketsController::class, "modify"]);
