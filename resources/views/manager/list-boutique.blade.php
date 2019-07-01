@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green warehouse icon"></i>
                <div class="content">
                    Liste boutique
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="field">
                <label>Nom boutique</label>
                <input type="text" name="nomBoutique" placeholder="Nom boutique">
            </div>
            <div class="field">
                <label>Adresse boutique</label>
                <input type="text" name="adresseBoutique" placeholder="Adresse boutique">
            </div>
            <div class="field">
                <label>Adresse IP du boutique</label>
                <input type="text" name="IPBoutique" placeholder="Adresse IP du boutique">
            </div>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <div class="ui right floated green button">
                        <i class="pencil alternate icon"></i> Ajouter boutique
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table class="ui green table">
            <thead>
            <tr><th>Nom boutique</th>
                <th>Adresse boutique</th>
                <th>Passerelle</th>
                <th>Supprimer</th>
            </tr></thead>
            <tbody>
            <tr>
                <td data-label="nomBoutique">POS Alger</td>
                <td data-label="adresseBoutique">Alger</td>
                <td data-label="passerelle">POS_Hydra:173:31:4:1</td>
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