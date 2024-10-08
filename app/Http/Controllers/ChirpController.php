<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(): View
    {
       //returns the 'chirps.index' view and pass the 'chirps' data to it
       return view('chirps.index', [

         // Fetch all chirps from the database, including the related 'user' data for each chirp
        // 'with' performs eager loading to load related 'user' models to avoid the "N+1" problem
        // 'latest' ensures chirps are sorted by the most recent ones first-descending order
        // 'get()' retrieves all the chirps that match the query
        'chirps' => Chirp::with('user')->latest()->get()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //validates the incoming request data
        $validated = $request->validate([
         // Ensure 'message' is required, is a string, and has a max length of 255 characters
            'message'=> 'required|string|max:255',
        ]);
         

        //creates a new chirp associated with the authenticated user
        $request->user()->chirps()->create($validated);
        

        //redirect to the chirps.index route after successful storage
        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {
        //Check if the user has permission to update the chirp.
        Gate::authorize('update', $chirp);
        
         // Return the edit view, passing the chirp as a variable to prefill the form.
        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp):RedirectResponse
    {
        //Check if the user has permission to update the chirp.
        Gate::authorize('update', $chirp);
        
        // Validate the input, ensuring the 'message' is required, a string, and has a max length of 255 characters.
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        

        // Update the chirp with the validated data.
        $chirp->update($validated);
 


        // Redirect back to the chirps index page after updating.
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
