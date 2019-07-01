@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="blue sticky note icon"></i>
                <div class="content">
                    Lancer une nouvelle tâche
                </div>
            </h2>
        </div>

        <div class="ui centered grid">
            <div class="content">
                <table class="ui very basic table">
                    <tbody>
                    <tr>
                        <td>
                            <h4>Famille de type de tâche</h4>
                        </td>
                        <td>
                            Tâche sur NNM
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Type de tâche</h4>
                        </td>
                        <td>
                            Ajout MIB
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><br><br>
        <div class="ui middle aligned center aligned grid padd">
            <h4 class="ui icon header">
                <div class="content">
                    Liste des hardwares associés à cette tâche
                </div>
            </h4>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="field">
                <label>Type hardware</label>
                <select class="ui fluid dropdown">
                    <option value="hp openview">HP Openview</option>
                </select>
            </div>
            <div class="field">
                <label>Serveur</label>
                <select class="ui fluid dropdown">
                    <option value="alsvas01">ALSVAS01</option>
                </select>
            </div>
            <div class="inline field"><br>
                <button class="fluid ui green button">
                    <i class="check icon"></i>
                    Valider
                </button>
            </div>
        </div><br>

        <table class="ui blue table">
            <thead>
            <tr>
                <th>Nom hardware</th>
                <th>Adresse IP</th>
                <th>Type hardware</th>
                <th>Marque hardware</th>
                <th>Constructeur</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    No records to display
                </td>
            </tr>
            </tbody>
        </table>
        <div class="ui middle aligned center aligned grid padd">
            <h4 class="ui icon header">
                <div class="content">
                    Liste des softwares associés à cette tâche
                </div>
            </h4>
        </div>
        <table class="ui blue table">
            <thead>
            <tr>
                <th>Nom software</th>
                <th>Type software</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    No records to display
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection