<?php

namespace App\Http\Controllers;

use App\Mail\MailClient;
use App\Mail\refusMail;
use App\Models\Client;
use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{

    public function infosClient()
    {
        return view('client.info');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'prenom' => 'required|string|max:100',
            'telephone' => 'required|numeric'
        ]);
        $client = new Client();
        $client->prenom = $request->get('prenom');
        $client->telephone = $request->get('telephone');
        $client->user_id = Auth::user()->id;


        $user = User::findOrFail(Auth::user()->id);

        $user->isNew = false;
        $user->update();

        $client->save();
        return Redirect::to('/home')->with('status', 'Votre compte est créé avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evenement = Evenement::findOrFail($id)->first();
        return view('client.evenement.reserver', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }
    public function reserver(Request $request, $id)
    {
        $reference = uniqid();
        // $reference = substr($reference, 0, 8) + (string)$id;

        $request->validate([
            'nombre_place' => 'required|max:10'
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $evenement = Evenement::findOrFail($id);
        // reference
        // nombre_place
        $user->evenements()->attach(
            $evenement,
            [
                'nombrePlace' => $request->nombre_place,
                'reference' => $reference
            ]
        );

        Mail::to($user->email)->send(new MailClient());

        return Redirect::to('/')->with('status', 'reservation effectué avec success vous avez bientot recevoir les details par mail');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function refuser($id, $id_user)
    {

        $user = User::findOrFail($id_user);
        $evenement = Evenement::get();
        // reference
        // nombre_place
        $user->evenements()
            ->wherePivot(
                'id',
                $id
            )->updateExistingPivot(
                $evenement,
                ['est_acepte' => false]
            );
        Mail::to($user->email)->send(new refusMail());

        return back()->with('status', 'Reservation de clinee avec sucess');
    }
}
