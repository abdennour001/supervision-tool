@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">

        <div class="ui one column stackable center aligned grid">
            <div class="column twelve wide padd">
                <h2 class="ui icon header">
                    <i class="blue history icon"></i>
                    <div class="content">
                        Liste historique software
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
                        <th>Software</th>
                        <th>Date d'utilisation</th>
                        <th>Tache #</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taches = \App\TacheIT::query()->where('id_ingenieur', \Illuminate\Support\Facades\Session::get('profil')->id_profil)->orderByDesc('created_at')->paginate(5) as $tache)
                        @foreach($softwareList = $tache->typeTache->typesSoftware as $software)
                            <tr>
                                <td data-label="number" class="collapsing">
                                    {{ $software->id_type_software }}
                                </td>
                                <td data-label="software" class="collapsing">
                                    <div>
                                        {{ $software->libelle_type_software }}
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