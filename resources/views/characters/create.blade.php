@extends('layouts/app')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un personnage</div>
                <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{URL::route('characters.store')}}">
            <div class="form-group">
                {{ csrf_field() }}
                <label for="nom" class="col-md-2 control-label">Pseudo</label>
                <div class="col-md-6 col-xl-12">
                    <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="faction" class="col-md-2 control-label">Faction</label>
                <div class="col-md-6 col-xl-12">
                    <select id="faction" name="faction" class="form-control" value="{{old('faction')}}" required >
                        <option>Horde</option>
                        <option>Alliance</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="race" class="col-md-2 control-label">Race</label>
                <div class="col-md-6 col-xl-12">
                    <select id="race" class="form-control" name="race" value="{{ old('race') }}" required >
                        <option disabled selected value></option>

                        <option>Elf de sang</option>
                        <option>Gobelin</option>
                        <option>Orc</option>
                        <option>Mort Vivant</option>
                        <option>Tauren</option>
                        <option>Troll</option>
                        <option>Draenei</option>
                        <option>Elf de la nuit</option>
                        <option>Gnome</option>
                        <option>Humain</option>
                        <option>Nain</option>
                        <option>Pandaren Alliance</option>
                        <option>Pandaren Horde</option>

                    </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="classe" class="col-md-2 control-label">Classe</label>
                    <div class="col-md-6 col-xl-12">
                        <select id="classe" class="form-control" name="classe" value="{{ old('classe') }}" required >
                            <option disabled selected value></option>

                            <option>Chaman</option>
                            <option>Chevalier de la mort</option>
                            <option>Voleur</option>
                            <option>Guerrier</option>
                            <option>Mage</option>
                            <option>Druide</option>
                            <option>Demoniste</option>
                            <option>Prete</option>
                            <option>Moine</option>
                            <option>Paladin</option>
                            <option>Chasseur</option>
                            <option>Chasseur de démon</option>
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <label for="level" class="col-md-2 control-label">Niveau</label>
                <div class="col-md-6 col-xl-12">
                    <input id="level" type="number" class="form-control" name="level" value="{{old('level')}}" required >
                </div>
            </div>
            <div class="form-group">
                <label for="itemLevel" class="col-md-2 control-label">Niveau d'objet</label>
                <div class="col-md-6 col-xl-12">
                    <input type="number" class="form-control" name="itemLevel" value="{{old('itemLevel')}}" required autofocus max="950" min="600">
                </div>
            </div>
            <div class="form-group">
                <label for="itemlevel" class="col-md-2 control-label">Serveur</label>
                <div class="col-md-6 col-xl-12">
                    <select id="serveur" name="serveur" class="form-control" value="{{old('serveur')}}" required autofocus>
                        <option>Ysondre</option>
                        <option>Hyjal</option>
                        <option>Archimonde</option>
                        <option>KhazModan</option>
                        <option>Sargeras</option>
                        <option>Kaelthas</option>
                        <option>Les clairvoyants</option>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-xl-12 col-md-offset-2">
                    <button type="submit" class="btn btn-success">
                        Ajouter ce personnage
                    </button>
                </div>
            </div>
            <input id="user_id" name="user_id" type="number" hidden value="{{Auth::user()->id }}">
        </form>

@endsection