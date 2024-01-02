@extends('layouts.auth')
@section('formulaire')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        SAMA EVEN: Reserver une place
    </div>
    <form class="py-4 px-6" method="POST" action="{{ route('reserver', $evenement->id) }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Nomre de place
            </label>
            <input name="nombre_place" :value="old('nombre_place')" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="number" placeholder="Nomre de place">
        </div>

        <div class="flex items-center justify-center mb-4">
            <button class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline" type="submit">
                Reserver
            </button>
        </div>
    </form>
</div>
@endsection