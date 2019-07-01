@extends('layouts.manager')

@section('content-manager')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green calendar icon"></i>
                <div class="content">
                    Projet : <span> Projet 1</span>
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid padd">
            <div class="content">
                <h4>Liste des étapes</h4><br>
            </div>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="field">
                <label>Nom de l'étape</label>
                <input type="text" name="step name" placeholder="Nom de l'étape">
            </div>
            <div class="field">
                <label>Date début</label>
                <input type="date" name="date debut">
            </div>
            <div class="field">
                <label>Date fin</label>
                <input type="date" name="date fin">
            </div>
            <div class="field">
                <label>Priorité</label>
                <select class="ui fluid dropdown">
                    <option value="Faible">Faible</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Forte">Forte</option>
                </select>
            </div>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <div class="ui green button">
                        <i class="check icon"></i>Ajouter étape
                    </div>
                </div>
            </div>
        </div>

        <table class="ui green table">
            <thead>
            <tr>
                <th>
                    <p class="nobr">Etape : <span>Etape 1</span></p>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p class="nobr">Date début : <span> 22/5/2019 </span></p>
                    <p class="nobr">Date fin : <span> 22/5/2019</span></p>
                    <p class="nobr">Priorité : <span> Faible</span></p>
                    <p>Livré : <span> Non</span></p>
                    <div class="ui right floated red button">
                        <i class="window close icon"></i> Supprimer
                    </div>
                    <div class="ui right floated green button">
                        <i class="calendar check outline icon"></i> Valider
                    </div>
                    <div class="ui right floated primary button">
                        <i class="pencil alternate icon"></i> Modifier
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection