@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{auth::user()->prenom}}
                </div>

                <div class="panel-body">
                    Vous êtes connecté!
                </div>
            </div>
        </div>
    </div>


@endsection
