@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="red code icon"></i>
                <div class="content">
                    Liste software
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="field">
                <label>Software</label>
                <input type="text" name="software" placeholder="Software">
            </div>
            <div class="field">
                <label>Type software</label>
                <select class="ui fluid dropdown">
                    <option value="routeur">HP Openview</option>
                </select>
            </div>
            <div class="field">
                <label>Serveur</label>
                <select class="ui fluid dropdown">
                    <option value="routeur">ALSVAS01</option>
                </select>
            </div>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <div class="ui right floated green button">
                        <i class="pencil alternate icon"></i> Ajouter un software
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table class="ui red table">
            <thead>
            <tr><th>Software</th>
                <th>Type software</th>
                <th>Serveur</th>
                <th>Supprimer</th>
            </tr></thead>
            <tbody>
            <tr>
                <td data-label="Software">NNM2</td>
                <td data-label="TypeSoftware">HP Openview</td>
                <td data-label="dnmware-wataniya">dnmware wataniya</td>
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
            <tr>
                <td data-label="Software">NNM2</td>
                <td data-label="TypeSoftware">HP Openview</td>
                <td data-label="dnmware-wataniya">dnmware wataniya</td>
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
            <tr>
                <td data-label="Software">NNM2</td>
                <td data-label="TypeSoftware">HP Openview</td>
                <td data-label="dnmware-wataniya">dnmware wataniya</td>
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