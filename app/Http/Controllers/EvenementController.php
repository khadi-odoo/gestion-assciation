<?php

namespace App\Http\Controllers;

use App\Mail\MailClient;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('welcome', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('association.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'date_limite_iscription' => 'required|date|after:now',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nombre_place' => 'required|integer|max:2000',
            'date_evenement' => 'required|date|after:now',
        ]);
        $evenement = new Evenement();
        $imagePath = $request->file('image')->store('images/evenement', 'public');

        $evenement->image = $imagePath;
        $evenement->libelle = $request->get('libelle');
        $evenement->description = $request->get('description');
        $evenement->date_limite_iscription = $request->get('date_limite_iscription');
        $evenement->date_evenement = $request->get('date_evenement');
        $evenement->nombre_place = $request->get('nombre_place');
        $evenement->association_id = Auth::user()->id;

        $evenement->save();

        return back()->with('status', 'Evenvement ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evenement = Evenement::findOrFail($id);
        $reservation = $evenement->users()->get();
        // dd($reservation);
        return view('association.show', ['evenement' => $evenement, 'reservations' => $reservation]);
    }

    public function clientShow($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('client.envenement.show', ['evenement' => $evenement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('association.edit', ['evenement' => $evenement]);
    }
    public function fermerEven($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->est_clos = true;
        $evenement->update();
        return back()->with('status', "Reservation sur l'evenement clocturée avec succès");
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'date_limite_iscription' => 'required|date|after:now',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nombre_place' => 'required|integer|max:2000',
            'date_evenement' => 'required|date|after:now',
        ]);
        $evenement = Evenement::findOrFail($id);
        if ($request->file('image')) {
            Storage::disk('public')->delete($evenement->image);
            $imagePath = $request->file('image')->store('images/evenement', 'public');
            $evenement->image = $imagePath;
        }
        $evenement->libelle = $request->get('libelle');
        $evenement->description = $request->get('description');
        $evenement->date_limite_iscription = $request->get('date_limite_iscription');
        $evenement->date_evenement = $request->get('date_evenement');
        $evenement->nombre_place = $request->get('nombre_place');
        $evenement->association_id = Auth::user()->id;

        $evenement->update();

        return Redirect::to('/association/dashboard')->with('status', 'Evenvement ajouté avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        Storage::disk('public')->delete($evenement->image);
        $evenement->delete();
        return back()->with('status', 'evenement supprimé avec succès');
    }
}
