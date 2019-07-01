@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="red clipboard list icon"></i>
                <div class="content">
                    Liste des familles de types de tâches
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="inline field">
                <label>Famille de type tâche</label>
                <input type="text" name="TaskType" placeholder="Type tâche">
            </div>
            <div class="inline field">
                <label>Seuil (minutes)</label>
                <input type="range" name="SeuilIn" id="SeuilInput" min="0" max="120" oninput="SeuilOutput.value = SeuilInput.value">
                <output for="Seuil" name="SeuilOut" id="SeuilOutput">24</output>
            </div>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <button class="ui green button">
                        <i class="plus icon"></i> Ajouter une famille type tâche
                    </button>
                </div>
            </div>
        </div>
        <br>
        <table class="ui red table">
            <thead>
            <tr>
                <th>Famille de type tâche</th>
                <th>Seuil (minutes)</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="TaskType">Troubleshooting</td>
                <td data-label="Seuil">60</td>
                <td data-label="Supprimer">
                    <button class="ui red button">
                        <i class="window close icon"></i>
                        Supprimer
                    </button>
                    <button class="ui primary button">
                        <i class="clipboard icon"></i>
                        modifier
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection