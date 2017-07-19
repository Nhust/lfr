@extends('layouts.app')
@section('title')
    Les derniers évènements
@stop
@section('content')
    <link rel="stylesheet" href="css/css.css">
    <h1>Les prochains events</h1>
        @foreach($tests as $test)
            <?php
            $eventsParticipantsConfirmer=DB::table('characters_event')
                    ->select('character_id')
                    ->where('event_id',$test->id)
                    ->where('status','1')
                    ->distinct()
                    ->count();
            ?>
            <a href=" {{URL::route('event.show',$test->id) }}">
            <div class="col-md-4 col-md-push-0 col-xs-8 col-xs-push-2"><br>
            <span class="title-event">{{$test->nom}}</span>
                <div class="panel panel-default">
                    <div class="panel-body event-card">
                        <img src="/image/test2.jpg" alt="" class="img-responsive ">
                        <p class="date-event">{{ $test->date }}</p>
                        <p class="nbPlayers"><span class="nb-Players-txt">{{$eventsParticipantsConfirmer}}</span><img src="/image/orc-black.png"></p>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
    <div class="pagination">
    {{$tests->links()}}
    </div>
@endsection