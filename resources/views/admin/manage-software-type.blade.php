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
        <div class="row mt-md-3 justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="d-flex">
                        <div>
                            <label for="type" class="mt-2 mx-4" style="font-size: medium;">Type software</label>
                        </div>
                        <div>
                            <input id="type" class="form-control" type="text" name="softwareType" placeholder="Type software">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ui buttons">
                    <button class="ui green button form-control">
                        <i class="plus icon"></i> Ajouter un type software
                    </button>
                </div>
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