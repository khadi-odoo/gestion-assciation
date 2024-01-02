@extends('layouts.auth')
@section('formulaire')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        SAMA EVEN
    </div>

    <form class="py-4 px-6" method="POST" action="{{ route('EregistrerInfo') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Slogan
            </label>
            <input name="slogan" :value="old('slogan')" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Entrez le sologan de votre association">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Date_creation
            </label>
            <input type="date" name="date_creation" :value="old('date_creation')" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Donnez votre mot de passe">
        </div>
        <div class="flex items-center justify-center mb-4">
            <button class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline" type="submit">
                Valider
            </button>
        </div>
    </form>
</div>
@endsection