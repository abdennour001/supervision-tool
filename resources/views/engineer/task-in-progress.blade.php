@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="blue sticky note icon"></i>
                <div class="content">
                    Liste des tâches en cours
                </div>
            </h2>
        </div>

        <table class="ui blue table">
            <thead>
            <tr>
                <th>
                    <h4>Tâche n°1</h4>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Type de tâche : <span>Ajout MIB</span></p>
                    <p class="nobr">Etat de la tâche : <span> <i class="play blue icon"></i></span></p>
                    <p class="nobr">Date de début : <span> 31/1/2018 12:22:33</span></p>
                    <button class="ui blue button"><i class="pause icon"></i></button>
                    <button class="ui green button"><i class="check icon"></i></button>
                    <button class="ui red button"><i class="reply icon"></i></button>
                    <button class="ui button"><i class="search icon"></i></button>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="ui blue table">
            <thead>
            <tr>
                <th>
                    <h4>Tâche n°2</h4>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Type de tâche : <span>Ajout MIB</span></p>
                    <p class="nobr">Etat de la tâche : <span> <i class="pause blue icon"></i></span></p>
                    <p class="nobr">Date de début : <span> 31/1/2018 12:22:33</span></p>
                    <button class="ui blue button"><i class="play icon"></i></button>
                    <button class="ui green button"><i class="check icon"></i></button>
                    <button class="ui red button"><i class="reply icon"></i></button>
                    <button class="ui button"><i class="search icon"></i></button>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection