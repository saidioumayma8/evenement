<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class eventController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $url = route('organisateur.index');
        
        return view('organisateur.index');
    }
    public function create()
    {
        return view('organisateur.create');
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'lieu' => 'required|string',
            'durai' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'required|',
            'isvalide' => 'required|boolean',
        ]);
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // $event = Event::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'date' => $request->date,
        //     'lieu' => $request->lieu,
        //     'durai' => $request->durai,
        //     'prix' => $request->prix,
        //     'image' => $request->file('image')->store('images'),
        //     'isvalide' => $request->isvalide,
        // ]);

        // event(new Registered($user));

        // Auth::login($user);



}
}

