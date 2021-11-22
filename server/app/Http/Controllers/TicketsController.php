<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function list() {
        return Ticket::all();
    }

    public function view($id) {
        $ticket = Ticket::find($id);
        return $ticket;
    }

    public function create(Request $request) {
        $newTicketData = json_decode($request->getContent());

        $newTicket = new Ticket();  
        
        $newTicket->col = $newTicketData->col;
        $newTicket->row = $newTicketData->row;

        $newTicket->save();
        return $newTicket;
    }

    public function modify(Request $request, $id) {
        $ticket = Ticket::find($id);
        $newTicketData = json_decode($request->getContent());   
        
        $ticket->col = $newTicketData->col;
        $ticket->row = $newTicketData->row;

        $ticket->save();
        return $ticket;
    }

    public function delete(Request $request, $id) {
        $ticket = Ticket::where("id", $id)->delete();
        return $ticket;
    }
}
