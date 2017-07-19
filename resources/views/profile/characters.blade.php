@extends('layouts/app')
@section('title')
    Vos personnages
@stop
@section('content')
    <h1>Vos personnages</h1><br>
   <div class="personnage-creer"> <a href="{{URL::route('characters.create')}}">Créer un Personnage</a></div>
    <table class="table table-character">
        <thead>
        <tr>
            <th>Niveau</th>
            <th>Pseudo</th>
            <th>Serveur</th>
            <th>Action</th>
        </tr>
        </thead>
            @foreach($characters as $character)
            <tr>
                <td>{{$character->level}}</td>
                <td><a href="{{URL::route('characters.show',$character->id)}}">{{$character->pseudo}}</a></td>
                <td>{{$character->serveur}}</td>
                <td><span class="editer"><a href="{{URL::route('characters.edit',$character->id)}}">Editer</a></span> / <span class="supprimer"><a href="{{URL::route('characters.destroy',$character->id)}}">Supprimer</a></span></td>
            </tr>


            @endforeach
    </table>
@endsection



