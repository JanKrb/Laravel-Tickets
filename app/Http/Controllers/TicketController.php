<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function createTicket() {
        return view('tickets.create-ticket');
    }

    public function listTicket() {
        return view('tickets.list-tickets');
    }

    public function adminTicket() {
        return view('tickets.admin-ticket');
    }

    public function viewTicket($ticketId) {
        return view('tickets.detail-ticket');
    }
}
