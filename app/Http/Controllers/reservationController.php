<?php

namespace App\Http\Controllers;

use App\Models\Event; // Make sure to import the Event model
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->input('eventsid'));
        $event = event::findOrFail($request->input('eventsid'));
        $reservation = new Reservation([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'isvalide' => false,
        ]);

        $reservation->save();

        return redirect()->back()->with('success', 'Reservation created successfully!');
    }

    public function index($id)
    {

        $event = event::findOrFail($id);
        // dd($events);
        return view('reservation.daitalsevent', compact('event'));
    }
    public function desplay()
    {

        $reservation = Reservation::where('isvalide', false)->with('event.user', function ($query) {
            $query->where('users.id', Auth::id());
        })->get();
        // dd($events);
        return view('operateur.daitalsevent', compact('reservation'));
    }

    public function show(Event $event)
    {
        return view('reservation.show', compact('event'));
    }

    public function liste_reservation()
    {
            $id =Auth()->id();
          $Reservation =  Reservation::where('user_id', $id)->get();
            return view('reservation.reservatioon', compact('Reservation'));
    }
}
