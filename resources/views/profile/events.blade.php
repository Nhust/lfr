@extends('layouts/app')
@section('content')
<h1>Vos Evènements</h1>
    <table class="table table-character">
        <thead>
        <tr>
            {{--<th>Nom</th>--}}
            <th>Instance</th>
            <th>Difficulté</th>
            <th>Date</th>
            <th>Confirmé</th>
            <th>En attente</th>
            <th>Action</th>
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

                <td>
                    <span class="voir"><a href="{{URL::route('event.show',$event->id)}}">Voir</a></span> /
                    <span class="supprimer"><a href="{{URL::route('events.destroy',$event->id)}}">Supprimer</a></span> /
                    <span class="editer"><a href="{{URL::route('event.edit',$event->id)}}">Editer</a></span>
                </td>
            </tr>
    @endforeach
    </table><br>
    <h1>Vos Participations</h1>
<table class="table table-character">
    <thead>
    <tr>
        <th>Instance</th>
        <th>Date</th>
        <th>Personnage</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    @foreach($participations as $participation)
        <tr>

            <td><a href="{{URL::route('event.show',$participation->eventId)}}">{{$participation->instanceNom}} - {{$participation->difficulte}}</a></td>
            <td>{{$participation->date}}</td>
            <td>{{$participation->pseudo}}</td>
            <td>

                @if($participation->status == 1)
                    Accepté
                @elseif($participation->status == 2)
                        Refusé
                @elseif($participation->status == 0)
                        En attente
                @endif
            </td>
            <td><span class="supprimer"><a href="{{URL::route('events.destroy',$event->id)}}">Supprimer</a></span> / <span class="editer"><a
                            href="{{URL::route('event.edit',$event->id)}}">Editer</a></span> </td>
        </tr>

@endforeach
</table>

@endsection