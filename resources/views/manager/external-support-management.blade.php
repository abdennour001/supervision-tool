@extends('layouts.manager')

@section('content-manager')

    <div class="pusher">

        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="green users icon"></i>
                <div class="content">
                    Liste des support externes
                </div>
            </h2>
        </div>

        <div class="ui centered grid">
            <form class="ui form">
                <div class="ui grid">
                    <div class="eight wide column">
                        <div class="field">
                            <label>Nom support</label>
                            <input type="text" name="nomSupport" placeholder="Nom Support">
                        </div>
                        <div class="field">
                            <label>Prénom contact</label>
                            <input type="text" name="prenom" placeholder="Prénom contact">
                        </div>
                        <div class="field">
                            <label>Nom contact</label>
                            <input type="text" name="nom" placeholder="Nom contact">
                        </div>
                    </div>
                    <div class="eight wide column">
                        <div class="field">
                            <label>Numéro mobile</label>
                            <input type="text" name="mobile" placeholder="Numéro mobile">
                        </div>
                        <div class="field">
                            <label>Mail</label>
                            <input type="email" name="mail" placeholder="Mail">
                        </div>
                        <div class="field">
                            <label>Adresse contact</label>
                            <input type="text" name="adresse" placeholder="Adresse">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="ui centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <button class="ui green button" type="submit">
                        <i class="check icon"></i> Ajouter
                    </button>
                </div>
            </div>
        </div>
        <br>
        <div class="ui centered grid">
            <table class="ui green table" style="width: 90%">
                <thead>
                <tr>
                    <th>Support</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Mail</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Cisco</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>077112299</td>
                    <td>Rue aaa</td>
                    <td>cisco@mail.com</td>
                    <td data-label="Supprimer">
                        <button class="ui red button">
                            Supprimer
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>

    </div>

@endsection