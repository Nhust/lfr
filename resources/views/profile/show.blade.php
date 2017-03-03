@extends('layouts/app')

@section('content')
    <h1>Profil de <span class="tag">{{$user->prenom}} {{$user->nom}}</span></h1>
    <h3>{{$user->btag}}</h3><br><br>
    @if(auth::user()->id==$user->id)<div class="personnage-creer"> <a href="{{URL::route('profile.edit',$user->id)}}">Modifier mon profil</a></div>
    @endif
    <br><br>

    <h3>Ses Events  :</h3>
    <table class="table table-character">
        <thead>
        <tr>
            {{--<th>Nom</th>--}}
            <th>Instance</th>
            <th>Difficulté</th>
            <th>Date</th>
            <th>Confirmé</th>
            <th>En attente</th>
        </tr>
        </thead>

        @foreach($events as $event)

            {{--POUR COMPTER LE NOMBRE DE PARTICIPANT--}}
            <?php
            $eventsParticipantsConfirmer=DB::table('characters_event')
                    ->select('character_id')
                    ->where('event_id',$event->id)
                    ->where('status','1')
                    ->distinct()
                    ->count();
            $eventsParticipantsAttente=DB::table('characters_event')
                    ->select('character_id')
                    ->where('event_id',$event->id)
                    ->where('status','0')
                    ->distinct()
                    ->count();
            ?>
            <tr>
                <td><a href="{{URL::route('event.show',$event->id)}}">{{$event->instanceNom}}</a></td>
                <td>{{$event->difficulte}}</td>
                <td>{{$event->date}}</td>
                <td>{{$eventsParticipantsConfirmer}}</td>
                <td>{{$eventsParticipantsAttente}}</td>
                </a>
            </tr>
    @endforeach
    </table><br>
    <h3>Ses Personnages</h3>
    <table class="table table-character">
        <thead>
        <tr>
            <th>Niveau</th>
            <th>Pseudo</th>
            <th>Serveur</th>
            </tr>
        </thead>
        @foreach($characters as $character)
            <tr>
                <td>{{$character->level}}</td>
                <td><a href="{{URL::route('characters.show',$character->id)}}">{{$character->pseudo}}</a></td>
                <td>{{$character->serveur}}</td>
            </tr>


        @endforeach
    </table>




@endsection