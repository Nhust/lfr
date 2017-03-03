@extends('layouts.app')
@section('content')

    @if($recherchesCount==0)
       <h1> Aucun évènement ne correpond à votre recherche, ressayez.</h1>
    @else
    <h1>Evènements associés à votre recherche : {{$recherchesCount}}</h1>

    @endif
    <br>
@foreach($recherches as $recherche)
    <?php
    $eventsParticipantsConfirmer=DB::table('characters_event')
            ->select('character_id')
            ->where('event_id',$recherche->id)
            ->where('status','1')
            ->distinct()
            ->count();
    ?>
    <a href=" {{URL::route('event.show',$recherche->id) }}">
        <div class="col-md-4 col-md-push-0 col-xs-8 col-xs-push-2"><br>
            <span class="title-event">{{$recherche->nom}}</span>
            <div class="panel panel-default">
                <div class="panel-body event-card">
                    <img src='/image/test2.jpg' alt="" class="img-responsive ">
                    <p class="date-event">{{ $recherche->date }}</p>
                    <p class="nbPlayers"><span class="nb-Players-txt">{{$eventsParticipantsConfirmer}}</span><img src="/image/orc-black.png"></p>
                </div>
            </div>
        </div>
    </a>
    @endforeach
@endsection