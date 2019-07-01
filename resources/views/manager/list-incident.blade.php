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
                <th>
                    <h4>Incident n°1</h4>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Description : <span> Incident 1</span></p>
                    <p class="nobr">Signalé le : <span> 22/5/2019 11:23:33</span></p>
                    <p class="nobr">Etat : <span> Non résolu</span></p>
                    <p>Sévérité : <span> Critique</span></p>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="ui green table">
            <thead>
            <tr>
                <th>
                    <h4>Incident n°2</h4>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Description : <span> Incident 2</span></p>
                    <p class="nobr">Signalé le : <span> 22/5/2019 11:23:33</span></p>
                    <p class="nobr">Etat : <span> Non résolu</span></p>
                    <p>Sévérité : <span> Critique</span></p>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="ui green table">
            <thead>
            <tr>
                <th>
                    <h4>Incident n°3</h4>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Description : <span> Incident 3</span></p>
                    <p class="nobr">Signalé le : <span> 22/5/2019 11:23:33</span></p>
                    <p class="nobr">Etat : <span> Non résolu</span></p>
                    <p>Sévérité : <span> Critique</span></p>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection