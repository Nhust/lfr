@extends('layouts/app')
@section('content')
    @if($user->id==Auth::user()->id)
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier son profil</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{URL::route('profile.update',$user->id)}}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put" />
                        <div class="form-group">
                            <label for="nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control" name="nom" value="{{$user->nom}}" required autofocus>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control" name="prenom" value="{{ $user->prenom }}" required autofocus>

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email }}" required>

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('btag') ? ' has-error' : '' }}">
                            <label for="btag" class="col-md-4 control-label">Battle Tag</label>

                            <div class="col-md-6">
                                <input id="btag" type="text" class="form-control" name="btag" value="{{ $user->btag }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
        <h4>Vous ne pouvez pas modifier cet utilisateur</h4>
@endif

@endsection