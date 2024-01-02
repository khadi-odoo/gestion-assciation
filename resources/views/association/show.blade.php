@extends('layouts.association')
@section('contenu')
<div class="bg-gray-100  py-8">
    <div class="max-w-6xl m-5 p-4 bg-white px-4 sm:px-6 lg:px-8 shadow rounded-lg">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[400px] w-[600px] rounded-lg bg-gray-300  mb-4">
                    <img class="w-full h-full object-cover" src="{{asset('storage/'. $evenement->image) }}" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <form action="{{'/association/fermerEven/'. $evenement->id}}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="w-full bg-gray-900  text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800" {{$evenement->est_clos ? 'disabled' : '' }}>
                                Clocturer
                            </button>
                        </form>
                    </div>
                    <div class="w-1/2 px-2">
                        <form action="{{route('supprimerEven', $evenement->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="w-full  bg-red-500  text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800" {{$evenement->est_clos ? 'disabled' : '' }}>
                                Suppirmé
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800  mb-2">Libelle: {{$evenement->libelle}}</h2>
                <p class="text-gray-600  text-sm mb-4">
                    Description: {{$evenement->description}}
                </p>
                <div class="flex mb-4">
                    <div>
                        <span class="font-bold text-gray-700">Date:</span>
                        <span class="text-gray-600  m-3"> {{$evenement->date_evenement}}</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 ">Date limite:</span>
                        <span class="text-gray-600  m-3"> {{$evenement->date_limite_iscription}}</span>
                    </div>

                </div>

                <div class="mb-4">
                    <span class="font-bold text-gray-700 ">Nobre de place:</span>
                    <div class="flex items-center mt-2">
                        <button class="bg-gray-300  text-gray-700  py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400">{{$evenement->nombre_place}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-6xl m-5 p-4 bg-white px-4 sm:px-6 lg:px-8 shadow rounded-lg">

        <h2 class="text-gray-900 text-lg font-semibold pb-4">Liste des reservation</h2>
        <div class="my-1"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-sm leading-normal">
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">email</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">reference</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">nombre de place</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">date reservation</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $reservation)
                <tr class="leading-norma">
                    <td class="py-2 px-4 bg-grey-lightest text-sm text-grey-light border-b border-grey-light">{{$reservation->email}}</td>
                    <td class="py-2 px-4 bg-grey-lightest text-sm text-grey-light border-b border-grey-light">{{$reservation->pivot->reference}}</td>
                    <td class="py-2 px-4 bg-grey-lightest text-sm text-grey-light border-b border-grey-light">{{$reservation->pivot->nombrePlace}}</td>
                    <td class="py-2 px-4 bg-grey-lightest text-sm text-grey-light border-b border-grey-light">{{$reservation->pivot->created_at}}</td>
                    <td class="flex justify-center align-middle py-2 px-4 border-b border-grey-light">
                        @if ($reservation->pivot->est_acepte)
                        <form action="{{route('refuser', [$reservation->pivot->id, $reservation->pivot->user_id])}}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="bg-yellow-300 hover:bg-yellow-500 text-white font-semibold py-2 px-4 rounded m-1">
                                Refusé
                            </button>
                        </form>
                        @else
                        <button class="bg-red-700 hover:bg-red-500 text-white font-semibold py-2 px-4 rounded m-1" {{$evenement->est_clos ? 'disabled' : '' }}>
                            Reservation deja Reusé
                        </button>
                        @endif
                    </td>
                    <!-- <td class="py-2 px-4 border-b border-grey-light">{{$evenement->association_id}}</td> -->
                </tr>
                @empty

                @endforelse

            </tbody>
        </table>
        <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
        <div class="text-right mt-4">
            <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                Ver más
            </button>
        </div>
    </div>
</div>
@endsection