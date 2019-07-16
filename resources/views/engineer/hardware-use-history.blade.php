@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">

        <div class="ui one column stackable center aligned grid">
            <div class="column twelve wide padd">
                <h2 class="ui icon header">
                    <i class="blue history icon"></i>
                    <div class="content">
                        Liste historique hardware
                    </div>
                </h2>
            </div>
        </div>

        <div class="row my-md-3">
            <div class="col-md-6 offset-md-3">
                <table class="ui blue table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hardware</th>
                        <th>Date d'utilisation</th>
                        <th>Tache #</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taches = \App\TacheIT::query()->where('id_ingenieur', \Illuminate\Support\Facades\Session::get('profil')->id_profil)->orderByDesc('created_at')->paginate(5) as $tache)
                        @foreach($hardwareList = $tache->typeTache->typesHardware as $hardware)
                            <tr>
                                <td data-label="number" class="collapsing">
                                    {{ $hardware->id_type_hardware }}
                                </td>
                                <td data-label="hardware" class="collapsing">
                                    <div>
                                        {{ $hardware->libelle_type_hardware }}
                                    </div>
                                </td>
                                <td data-label="date utilisation" class="collapsing">
                                    {{ $tache->date_affectation_tache }}
                                </td>
                                <td>{{ $tache->id_tache }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection