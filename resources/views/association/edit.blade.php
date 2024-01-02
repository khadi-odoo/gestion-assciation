@extends('layouts.association')
@section('contenu')
<div class="flex-1 p-4 w-full md:w-1/2">
    <div class="md:flex justify-center">
        <div class="w-3/4 px-6 py-3 md:p-8  bg-white p-5">
            <h2 class="text-2xl font-bold text-gray-800">Ajouter un evenement</h2>
            <form action="{{route('modifierEven', [$evenement->id])}}" class="mt-3" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-2">
                    <label class="block text-gray-800 font-bold mb-2" for="name">
                        Libelle
                    </label>
                    <input name="libelle" value="{{$evenement->libelle}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Same even">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-800 font-bold mb-2" for="email">
                        Description
                    </label>
                    <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="" id="" cols="20" rows="5"> {{$evenement->description}}</textarea>
                </div>
                <div class="mb-2">
                    <label class="block text-gray-800 font-bold mb-2" for="name">
                        Nobre de Place
                    </label>
                    <input name="nombre_place" value="{{$evenement->nombre_place}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="100">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-800 font-bold mb-2" for="card_number">
                        image
                    </label>
                    <input name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="card_number" type="file">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-800 font-bold mb-2" for="expiration_date">
                        Date limite d'iscription
                    </label>
                    <input name="date_limite_iscription" value="{{$evenement->date_limite_iscription}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="expiration_date" type="date">
                </div>
                <div class="mb-2">
                    <label class="block text-gray-800 font-bold mb-2" for="expiration_date">
                        date_evenement
                    </label>
                    <input name="date_evenement" value="{{$evenement->date_evenement}}" name="date_limite_iscription" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="expiration_date" type="date">
                </div>
                <button type="submit" class="bg-gray-800  hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection