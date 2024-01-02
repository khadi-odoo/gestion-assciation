@extends('layouts.client')
@section('clientContenu')

<div class="flex flex-wrap justify-center px-3 py-3">
    @foreach ($evenements as $evenement)
    <div class="w-1/4 rounded overflow-hidden bg-gray-50  shadow-lg m-1">
        <img class="w-full" src="{{asset('storage/'. $evenement->image) }}" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-1">{{$evenement->libelle}}</div>
            <p class="text-gray-700 text-base">
                {{$evenement->description}}
            </p>
            <p class="text-gray-700 text-base">
                <b>date de l'evenement:</b> {{$evenement->date_evenement}}
            </p>
            <p class="text-gray-700 text-base">
                <b>date limite d'iscription:</b> {{$evenement->date_limite_iscription}}
            </p>
            <p class="text-gray-700 text-base">
                <b>Nombre de place:</b> {{$evenement->nombre_place}}
            </p>
        </div>
        <div class="px-6 py-4">
            @if ($evenement->est_clos)
            <p class="text-gray-700 text-base">
                Les reservations pour cette evenement sont formé
            </p>
            @else
            <a href="{{'/client/reserver/evenement/'.$evenement->id}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Reserver une place</a>
            @endif

        </div>
    </div>
    @endforeach
</div>
@endsection