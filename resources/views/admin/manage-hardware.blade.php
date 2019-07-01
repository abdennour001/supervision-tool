@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="red hdd icon"></i>
                <div class="content">
                    Liste hardware
                </div>
            </h2>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <div class="ui right floated red button mx-1">
                        <i class="window close icon"></i> Supprimer type hardware
                    </div>
                    <div class="ui right floated green button mx-1">
                        <i class="pencil square icon"></i> Nouvelle référence hardware
                    </div>
                    <div class="ui right floated primary button mx-1">
                        <i class="pencil alternate icon"></i> Nouveau type hardware
                    </div>
                </div>
            </div>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="inline field">
                <label>Rechecher par type hardware</label>
                <select class="ui fluid dropdown">
                    <option value="routeur">Routeur</option>
                    <option value="switch">Switch</option>
                    <option value="hub">Hub</option>
                </select>
            </div>
        </div>
        <br>
        <table class="ui red table">
            <thead>
            <tr>
                <th>Constructeur</th>
                <th>Réference</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="Constructeur">Cisco</td>
                <td data-label="Reference">c1900</td>
                <td data-label="Supprimer">
                    <button class="ui red button">
                        <i class="window close icon"></i>
                        Supprimer
                    </button>
                </td>
            </tr>
            <tr>
                <td data-label="Constructeur">Cisco</td>
                <td data-label="Reference">3700</td>
                <td data-label="Supprimer">
                    <button class="ui red button">
                        <i class="window close icon"></i>
                        Supprimer
                    </button>
                </td>        </tr>
            <tr>
                <td data-label="Constructeur">Cisco</td>
                <td data-label="Reference">C2600</td>
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