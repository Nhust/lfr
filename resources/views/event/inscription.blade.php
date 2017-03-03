@extends('layouts.app')
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
<h1>Inscription</h1>
    <h3>Selectionnez votre personnage</h3><br>
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('eventsCharacters.save',$event->eventId) }}">
        <div class="form-group">
            {{ csrf_field() }}
            <label for="nom" class="col-md-2 control-label">Personnage</label>
            <div class="col-md-6 col-xl-12">
                <select id="personnage" type="text" class="form-control" name="personnage">
                    @foreach($personnages as $personnage)
                        <option>{{$personnage->pseudo}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-xl-12 col-md-offset-2">
                <button type="submit" class="btn btn-success">
                S'inscrire
                </button>
            </div>
        </div>
    </form>


@endsection
