@extends('layouts.app')
@section('title')
    {{$event->eventsNom}} - Roster
@stop
@section('content')
    <div class="banner" style="background:url('/image/test2.jpg')no-repeat;background-size:cover;">
        <h3 class="box-shadow event-title">{{$event->eventsNom}}</h3>
        <h3 class="box-shadow event-nom">{{$event->instancesNom}}</h3>
    </div>

    <nav>
        <li class="col-md-4 col-xs-4"><a href="{{URL::route('event.show',$event->eventId)}}" class="nav-liens"><img src="/image/description.png" class="icone-nav" alt=""><br>Description</a></li>
        <li class="col-md-4 col-xs-4"><a href="{{URL::route('event.showRoster',$event->eventId)}}" class="nav-liens"><img src="/image/roster.png" class="icone-nav" alt=""><br>Roster</a></li>
        <li class="col-md-4 col-xs-4"><a href="{{URL::route('event.inscription',$event->eventId)}}" class="nav-liens"><img src="/image/inscription.png" class="icone-nav" alt=""><br>Inscription</a></li>
    </nav>
    <h1>Le Roster</h1>
    <br>
    <h3>Joueur(s) accepté(s)</h3>

    <table class="table table-character">
        <thead>
        <tr>
            <th>Pseudo</th>
            <th>Classe</th>
            <th>Ilvl</th>
            @if($event->user_id == Auth::user()->id)
                <th>Action</th>
            @endif
        </tr>
        </thead>
@foreach($accepter as $accepte)
    <tr>
        <td>{{$accepte->pseudo}}</td>
        <td>{{$accepte->classe}}</td>
        <td>{{$accepte->itemLevel}} Ilvl</td>
        @if($event->user_id == Auth::user()->id)
            <td>
                <form role="form" method="post" action="{{ URL::route('event.refuser',[$id=$event->eventId,$refuser=$accepte->id]) }}">
                    <button type="submit" class="refuser">
                        Refuser
                    </button>
                    {{ csrf_field() }}
                </form>
            </td>
        @endif
    </tr>
@endforeach
    </table>
<br>
<h3>Joueurs en attente</h3>
<table class="table table-character">
    <thead>
    <tr>
        <th>Pseudo</th>
        <th>Classe</th>
        <th>Ilvl</th>
        @if($event->user_id == Auth::user()->id)
            <th>Action</th>
        @endif
    </tr>
    </thead>
    @foreach($players as $player)
        <tr>
            <td>{{$player->pseudo}}</td>
            <td>{{$player->classe}}</td>
            <td>{{$player->itemLevel}} iLvl</td>
            @if($event->user_id == Auth::user()->id)
                <td>
                    <form role="form" method="post" action="{{ URL::route('event.confirmer',[$id=$event->eventId,$confirmer=$player->id]) }}">
                        <button type="submit" class="confirmer">
                            Accepter
                        </button>
                        {{ csrf_field() }}
                    </form>
                    /
                    <form role="form" method="post" action="{{ URL::route('event.refuser',[$id=$event->eventId,$refuser=$player->id]) }}">
                        <button type="submit" class="refuser">
                            Refuser
                        </button>
                        {{ csrf_field() }}
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
</table>
@endsection