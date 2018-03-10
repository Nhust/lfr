@extends('layouts/app')

@section('title')
    Créer un évènement
@stop

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
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Créer un évènement</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('event.store') }}">
                            <div class="form-group">
                                <label for="nom" class="col-md-2 control-label">Nom</label>
                                <div class="col-md-10 col-xl-12">
                                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}"  autofocus>
                                    {{ csrf_field() }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-md-2 control-label">Date</label>
                                <div class="col-md-10 col-xl-12">
                                    <input id="date" type="date" class="form-control" name="date" value="{{old('date')}}" placeholder="Jour/Mois/Année" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="heure" class="col-md-2 control-label">Heure</label>
                                <div class="col-md-10 col-xl-12">
                                    <input id="heure" type="text" class="form-control" name="heure" value="{{ old('heure') }}" placeholder="00:00"  required  maxlength="5" minlength="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="instance" class="col-md-2 control-label">Instance</label>
                                <div class="col-md-10 col-xl-12">
                                    <select id="instance" class="form-control selectpicker" name="instance" value="{{ old('instance') }}" required >
                                        @foreach($instances as $instance)
                                            <option>{{$instance->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="difficulte" class="col-md-2 control-label">Difficulté</label>
                                <div class="col-md-10 col-xl-12">
                                    <select id="difficulte" name="difficulte" class="form-control selectpicker" value="{{old('difficulte')}}" required >
                                        <option>Normal</option>
                                        <option>HM</option>
                                        <option>MM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-2 control-label">Description</label>
                                <div class="col-md-10 col-xl-12">
                                    <textarea id="description" type="text" class="form-control" name="description"  >{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nbJoueurs" class="col-md-2 control-label">Nombre de joueur</label>
                                <div class="col-md-10 col-xl-12">
                                    <input type="number" class="form-control" name="nbJoueurs" value="{{old('nbJoueurs')}}" required  max="30">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-xl-12 col-md-offset-2">
                                    <button type="submit" class="btn btn-success">
                                        Créer l'évènement
                                    </button>
                                </div>
                            </div>
                            <input id="id" name="id" type="number" hidden value="{{Auth::user()->id }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection