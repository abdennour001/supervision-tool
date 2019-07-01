@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="blue bell icon"></i>
                <div class="content">
                    Liste des notifications
                </div>
            </h2>
        </div>

        <table class="ui blue table">
            <thead>
            <tr>
                <th>
                    <div class="nobr">
                        <h4>Objet : <span>Nouvelle tâche</span></h4>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Date : <span>Ajout MIB</span></p>
                    <p class="nobr">Urgence : <span> </span></p>
                    <p>Le manager vous a affecté une nouvelle tâche. Veuillez cliquez <a href="taskInProgress.html">ici</a> pour voir cette tâche en détail</p>
                    <button class="ui red button"><i class="trash icon"></i></button>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="ui blue table">
            <thead>
            <tr>
                <th>
                    <h4>Objet : <span>Nouvelle tâche</span></h4>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Date : <span>Ajout MIB</span></p>
                    <p class="nobr">Urgence : <span> </span></p>
                    <p>Le manager vous a affecté une nouvelle tâche. Veuillez cliquez <a href="taskInProgress.html">ici</a> pour voir cette tâche en détail</p>
                    <button class="ui red button"><i class="trash icon"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection