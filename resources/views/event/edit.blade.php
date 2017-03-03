@extends('layouts/app')
@section('content')
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all()  as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" role="form" method="post" action="{{ URL::route('event.update',$event->id) }}">

            <input type="hidden" name="_method" value="put" />

            <div class="form-group">

                <label for="nom" class="col-md-2 control-label">Nom</label>
                <div class="col-md-6 col-xl-12">
                    <input id="nom" type="text" class="form-control" name="nom" value="{{ $event->nom }}"  autofocus>
                    {{ csrf_field() }}
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="col-md-2 control-label">Date</label>
                <div class="col-md-6 col-xl-12">
                    <input id="date" type="date" value="{{$date}}" class="form-control" name="date" required autofocus>
                </div>
            </div> <div class="form-group">
                <label for="heure" class="col-md-2 control-label">Heure</label>
                <div class="col-md-6 col-xl-12">
                    <input id="heure" type="time" value="{{$event->heure}}" class="form-control" name="heure" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="instance" class="col-md-2 control-label">Instance</label>
                <div class="col-md-6 col-xl-12">
                    <select id="instance" class="form-control"  name="instance" required autofocus>
                        @foreach($instances as $instance)
                            <?php if($instance->nom =='Iron Dock'){
                                echo "<option selected='selected'>{$instance->nom} true</option>";
                            }
                            else{
                                echo "<option>$instance->nom</option>";
                            }
                            ?>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="difficulte" class="col-md-2 control-label">Difficulté</label>
                <div class="col-md-6 col-xl-12">
                    <select id="difficulte" name="difficulte" class="form-control" value="{{$event->difficulte}}" required autofocus>
                        <option>Normal</option>
                        <option>HM</option>
                        <option>MM</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-2 control-label">Description</label>
                <div class="col-md-6 col-xl-12">
                    <textarea id="description" type="text" class="form-control" name="description"  style="height:200px;"required autofocus>{{$event->description}}
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="nbJoueurs" class="col-md-2 control-label">Nombre de joueur</label>
                <div class="col-md-6 col-xl-12">
                    <input type="number" class="form-control" name="nbJoueurs" value="{{$event->nbCharacters}}" required autofocus max="30">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-xl-12 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Mettre à jour l'évènement
                    </button>
                </div>
            </div>
            <input id="id" name="id" type="number" hidden value="{{Auth::user()->id }}">
        </form>

@endsection