@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green sticky note icon"></i>
                <div class="content">
                    Liste des incidents
                </div>
            </h2>
        </div>

        <div class="ui middle aligned center aligned grid form">
            <div class="field">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description">
            </div>
            <div class="field">
                <label>Séverité</label>
                <select class="ui fluid dropdown">
                    <option value="Critique">Critique</option>
                </select>
            </div>
        </div>

        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <button class="ui red button">Signaler</button>
                </div>
            </div>
        </div>

        <div class="ui middle aligned center aligned grid form">
            <div class="inline field">
                <select class="ui fluid dropdown">
                    <option value="resolu">resolu</option>
                    <option value="non resolu">non resolu</option>
                    <option value="source identifiee">source identifiée</option>
                    <option value="source non identifiee">source non identifiée</option>
                </select>
            </div>
        </div><br>

        <table class="ui green table">
            <thead>
            <tr>
                <th>Incident</th>
                <th>Description</th>
                <th>Date</th>
                <th>Etat</th>
                <th>Sévérité</th>
                <th>Cause</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>22/5/2019 11:23:33</td>
                <td>Non résolu</td>
                <td>Critique</td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection