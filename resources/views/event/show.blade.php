@extends('layouts.app')
@section('title')
     {{$event->eventsNom}} - Description
@stop
@section('title')
    {{$event->instancesNom}} - {{$event->eventsNom}}
@stop
@section('content')
    <div class="banner" style="background:url('/image/test4.jpg')no-repeat;background-size:cover;">
        <h3 class="box-shadow event-title">{{$event->eventsNom}}</h3>
        <h3 class="box-shadow event-nom">{{$event->instancesNom}}</h3>
    </div>
    <nav>
        <li class="col-md-4 col-xs-4"><a href="{{URL::route('event.show',$event->eventId)}}" class="nav-liens"><img src="/image/description.png" class="icone-nav" alt=""><br>Description</a></li>
        <li class="col-md-4 col-xs-4"><a href="{{URL::route('event.showRoster',$event->eventId)}}" class="nav-liens"><img src="/image/roster.png" class="icone-nav" alt=""><br>Roster</a></li>
        <li class="col-md-4 col-xs-4"><a href="{{URL::route('event.inscription',$event->eventId)}}" class="nav-liens"><img src="/image/inscription.png" class="icone-nav" alt=""><br>Inscription</a></li>
    </nav>
    <h1 class="description">Description</h1>
    <p class="format">Format : {{$event->nbCharacters}} Joueurs</p>
    <p class="date">Début le {{$event->date}} à {{$event->heure}}</p>
    <p class="description">  {{$event->description}}</p>
    </p>



@endsection


