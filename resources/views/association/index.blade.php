@extends('layouts.association')
@section('contenu')

<!-- Área de contenido principal -->
<div class="flex-1 p-4 w-full md:w-1/2">

    <div class="text-right mt-4">
        <button class="text-right mt-4">
            <a href="{{'ajouterEven'}}" class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                ajouter un evenement
            </a>
        </button>
    </div>
    <!-- Tercer contenedor debajo de los dos anteriores -->
    <!-- Sección 3 - Tabla de Autorizaciones Pendientes -->
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <h2 class="text-gray-900 text-lg font-semibold pb-4">Liste des Evenements</h2>
        <div class="my-1"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-sm leading-normal">
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">image</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">libelle</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">date_limite_iscription</th>
                    <!-- <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">est_clos</th> -->
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">date_evenement</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">nombre_place</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">actions</th>
                    <!-- <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">association_id</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse ($evenements as $evenement)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b border-grey-light"><img src="{{asset('storage/'. $evenement->image) }}" alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                    <td class="py-2 px-4 border-b border-grey-light">{{$evenement->libelle}}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{$evenement->date_limite_iscription}}</td>
                    <!-- <td class="py-2 px-4 border-b border-grey-light">{{$evenement->est_clos}}</td> -->
                    <td class="py-2 px-4 border-b border-grey-light">{{$evenement->date_evenement}}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{$evenement->nombre_place}}</td>
                    <td class="flex justify-center align-middle py-2 px-4 border-b border-grey-light">
                        <a href="{{'/association/voirEven/'. $evenement->id}}" class=" bg-gray-800  hover:bg-gray-500  text-white font-semibold py-2 px-4 rounded m-1">
                            voir+
                        </a>
                        <a href="{{'/association/modifierEven/'. $evenement->id}}" class="bg-blue-500 hover:bg-blue-400 text-white font-semibold py-2 px-4 rounded m-1">
                            modifier
                        </a>
                        <form action="{{'/association/fermerEven/'. $evenement->id}}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="bg-yellow-300 hover:bg-yellow-500 text-white font-semibold py-2 px-4 rounded m-1" {{$evenement->est_clos ? 'disabled' : '' }}>
                                Clocturer
                            </button>
                        </form>
                        <form action="{{route('supprimerEven', $evenement->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class=" bg-red-500 hover:bg-red-300 text-white font-semibold py-2 px-4 rounded m-1">
                                Suppirmé
                            </button>
                        </form>
                    </td>
                    <!-- <td class="py-2 px-4 border-b border-grey-light">{{$evenement->association_id}}</td> -->
                </tr>
                @empty
                <p>ajouter un evenement</p>
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