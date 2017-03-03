@extends('layouts/app')
@section('content')
<div class="container">
    <img src="/image/hunter.png" style="width:150px" alt=""><br><br>
    <h1><b>Pseudo</b> {{$char->pseudo}}</h1>
    <h3><b>Faction</b> {{$char->faction}}</h3>
    <h3><b>Serveur</b> {{$char->serveur}}</h3>
    <h3><b>Classe : </b> {{$char->classe}}</h3>
    <h3><b>Level</b> {{$char->level}}</h3>
    <h3><b>ItemLevel</b> {{$char->itemLevel}}</h3>

</div>

@endsection