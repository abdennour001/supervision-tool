@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">

        <div class="ui one column stackable center aligned grid">
            <div class="column twelve wide padd">
                <h2 class="ui icon header">
                    <i class="green history icon"></i>
                    <div class="content">
                        Liste historique software
                    </div>
                </h2>
            </div>
        </div>
        <div class="ui middle aligned center aligned grid padd">

        </div>

        <table class="ui green table">
            <thead>
            <tr>
                <th>#</th>
                <th>Software </th>
                <th>Ingénieur</th>
                <th>Date d'utilisation</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="number" class="collapsing">
                    1
                </td>
                <td data-label="hardware" class="collapsing">
                    <div>
                        HP Openview
                    </div>
                </td>
                <td data-label="ingenieur" class="collapsing">
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                </td>
                <td data-label="date utilisation" class="collapsing">
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
                <td data-label="hardware" class="collapsing">
                    <div>
                        HP Openview
                    </div>
                </td>
                <td data-label="ingenieur" class="collapsing">
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                </td>
                <td data-label="date utilisation" class="collapsing">
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
                <td data-label="number" class="collapsing">3</td>
                <td data-label="hardware" class="collapsing">
                    <div>
                        HP Openview
                    </div>
                </td>
                <td data-label="ingenieur" class="collapsing">
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                    <div>
                        Nom Prénom
                    </div>
                </td>
                <td data-label="date utilisation" class="collapsing">
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