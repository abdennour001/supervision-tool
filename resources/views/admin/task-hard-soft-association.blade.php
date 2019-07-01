@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="red puzzle piece icon"></i>
                <div class="content">
                    Liste des familles de types de tâches
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <div class="content">
                    <h4>Type tâche : Troublshooting</h4>
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="inline field">
                <label>Seuil (minutes)</label>
                <input type="range" name="SeuilIn" id="SeuilInput" min="0" max="120" oninput="SeuilOutput.value = SeuilInput.value">
                <output for="Seuil" name="SeuilOut" id="SeuilOutput">24</output>
            </div>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <div class="ui right floated green button">
                        <i class="plus icon"></i> Ajouter un type tâche
                    </div>
                    <div class="ui right floated primary button">
                        <i class="pencil alternate icon"></i> Renomer
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h4>Types de hardware associé</h4>
        <table class="ui red table">
            <thead>
            <tr>
                <th>Nom hardware</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="TaskType">Serveur</td>
                <td data-label="Supprimer">
                    <button class="ui red button">
                        <i class="window close icon"></i>
                        Supprimer
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <h4>Types de software associé</h4>
        <table class="ui red table">
            <thead>
            <tr>
                <th>Nom software</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="TaskType">Syslog</td>
                <td data-label="Supprimer">
                    <button class="ui red button">
                        <i class="window close icon"></i>
                        Supprimer
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection