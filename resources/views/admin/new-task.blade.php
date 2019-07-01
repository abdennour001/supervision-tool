@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="red thumbtack icon"></i>
                <div class="content">
                    Liste des types de tâches
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="inline field">
                <label>Type tâche</label>
                <input type="text" name="TaskType" placeholder="Type tâche">
            </div>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <button class="ui green button">
                        <i class="plus icon"></i> Ajouter un type tâche
                    </button>
                </div>
            </div>
        </div>
        <br>
        <table class="ui red table">
            <thead>
            <tr>
                <th>Type tâche</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="TaskType">Troubleshooting</td>
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
            <tr>
                <td data-label="TaskType">Contacter support</td>
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
            <tr>
                <td data-label="TaskType">Créer VPN</td>
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