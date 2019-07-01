@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="red code icon"></i>
                <div class="content">
                    Liste type software
                </div>
            </h2>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <button class="ui green button">
                        <i class="plus icon"></i> Ajouter un type software
                    </button>
                </div>
            </div>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="inline field">
                <label>Type software</label>
                <input type="text" name="softwareType" placeholder="Type software">
            </div>
        </div>
        <br>
        <table class="ui red table">
            <thead>
            <tr>
                <th>Type software</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="TypeSoftware">HP Openview</td>
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
                <td data-label="TypeSoftware">HP Openview</td>
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
                <td data-label="TypeSoftware">HP Openview</td>
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