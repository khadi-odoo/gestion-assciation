@extends('layouts.auth')
@section('formulaire')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        Réservation
    </div>

    <form class="py-4 px-6" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input name="email" :value="old('email')" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Entrez votre email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Mot de Passe
            </label>
            <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Donnez votre mot de passe">
        </div>
        <div class="flex items-center justify-center mb-4">
            <button class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline" type="submit">
                Valider
            </button>
        </div>
    </form>
</div>
@endsection