<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Auth;

class eventController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
{
    $url = route('organisateur.index');

    $query = event::where('isvalide', 1)->where('user_id', Auth()->id());

    // Check if a search term is provided
    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where('title', 'like', '%' . $searchTerm . '%');
    }

    $events = $query->get();

    return view('dashboard', compact('events'));
}

    public function home()
    {
        $events = event::where('isvalide', true)->get();

        return view('welcome', compact('events'));
    }

    public function valid()
    {
        $events = event::where('isvalide', false)->get();

        // dd($events);

        return view('admin.evenement.index', compact('events'));
    }

    public function valid_event($id)
    {

        $event = event::find($id);

        if ($event) {

            $event->isvalide = 1;

            $event->save();


            return redirect()->back();
        }
    }

    public function create()
    {
        return view('organisateur.create');
    }
    public function dashboard()
    {
        $events = event::where('isvalide', true)->get();
        return view('dashboard',  compact('events'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isvalide' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');

            event::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'lieu' => $request->lieu,
                'durai' => $request->durai,
                'prix' => $request->prix,
                'image' => $imagePath,
                'isvalide' => $request->isvalide,
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('organisateur.index')->with('success', 'Event created successfully!');
        } else {
            return redirect()->back()->with('error', 'Please provide an image file.');
        }
    }
}
