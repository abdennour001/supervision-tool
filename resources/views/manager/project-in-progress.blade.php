@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green calendar icon"></i>
                <div class="content">
                    Liste des projets en cours
                </div>
            </h2>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <div class="ui right floated red button">
                        <i class="window close icon"></i> Supprimer
                    </div>
                    <div class="ui right floated green button">
                        <i class="plus icon"></i> Ajouter
                    </div>
                    <div class="ui right floated primary button">
                        <i class="pencil alternate icon"></i> Modifier
                    </div>
                </div>
            </div>
        </div>
        <table class="ui green table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Date début</th>
                <th>Date fin</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="number" class="collapsing">1</td>
                <td data-label="project" class="collapsing">
                    <div>
                        <i class="caret down icon"></i> Projet 1
                    </div>
                    <div>
                        etape 1
                    </div>
                    <div>
                        etape 2
                    </div>
                    <div>
                        etape 3
                    </div>
                </td>
                <td data-label="date debut" class="collapsing">
                    <div>
                        21/2/2019
                    </div>
                    <div>
                        22/2/2019
                    </div>
                    <div>
                        23/2/2019
                    </div>
                    <div>
                        24/2/2019
                    </div>
                </td>
                <td data-label="date fin" class="collapsing">
                    <div>
                        25/2/2019
                    </div>
                    <div>
                        23/2/2019
                    </div>
                    <div>
                        24/2/2019
                    </div>
                    <div>
                        25/2/2019
                    </div>
                </td>
            </tr>
            <tr>
                <td data-label="number" class="collapsing">2</td>
                <td data-label="project" class="collapsing">
                    <div>
                        <i class="caret down icon"></i> Projet 2
                    </div>
                    <div>
                        etape 1
                    </div>
                    <div>
                        etape 2
                    </div>
                    <div>
                        etape 3
                    </div>
                </td>
                <td data-label="date debut">
                    <div>
                        21/2/2019
                    </div>
                    <div>
                        22/2/2019
                    </div>
                    <div>
                        23/2/2019
                    </div>
                    <div>
                        24/2/2019
                    </div>
                </td>
                <td data-label="date fin">
                    <div>
                        25/2/2019
                    </div>
                    <div>
                        23/2/2019
                    </div>
                    <div>
                        24/2/2019
                    </div>
                    <div>
                        25/2/2019
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection