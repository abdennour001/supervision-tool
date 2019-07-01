@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="blue calendar plus icon"></i>
                <div class="content">
                    Nouveau Projet
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="field">
                <label>Nom projet</label>
                <input type="text" name="nom projet" placeholder="Nom Projet">
            </div>
        </div>

        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <div class="ui green button">
                        <i class="check icon"></i> Ajouter
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection