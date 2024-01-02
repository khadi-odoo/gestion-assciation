<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function infosAssoc()
    {
        return view('association.info');
    }

    public function index()
    {
        $evenements = Evenement::where('association_id', '=', Auth::user()->id)->get();
        return view('association.index', compact('evenements'));
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
    public function store(Request $request)
    {
        $request->validate([
            'slogan' => 'required|string|max:100',
            'date_creation' => 'required|date|before:now'
        ]);
        $association = new Association();
        $association->slogan = $request->get('slogan');
        $association->date_creation = $request->get('date_creation');

        $association->user_id = Auth::user()->id;
        $user = User::findOrFail(Auth::user()->id);
        $user->isNew = false;
        $user->update();

        $association->save();
        return Redirect::to('/home')->with('status', 'Votre association est créée avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Association $association)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }
}
