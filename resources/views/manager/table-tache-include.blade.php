<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 my-md-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="pt-md-2">
                            <button class="btn btn-success rounded-circle return-tache" projet="{{ $etape->projet->id_projet }}">
                                <i class="glyphicon glyphicon-arrow-left" style="font-size: large;"></i>
                            </button>
                        </div>
                        <div style="font-weight: normal; font-size: large; margin-top: 15px;">
                            {{ $etape->projet->nom_projet }} > {{ $etape->nom_etape }} >
                        </div>
                    </div>
                    <div class="dropdown dropleft">
                        <button class="btn btn-sm add add-hard" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: x-large;">
                            <i class="green add piece icon"></i>
                        </button>
                        <div class="dropdown-menu mr-md-5" style="width: 250px; margin-right: 100px;">
                            <form class="px-4 py-3" method="post" action="{{ route('manager.manage-task.add-tache-it', $etape->id_etape) }}">
                                @csrf
                                <div class="mb-md-2">
                                    <label style="font-size: large; font-weight: bold">Ajouter une Tache</label>
                                </div>
                                <div class="form-group">
                                    <label for="projectName" style="font-weight: normal; font-size: medium;">Date affectation</label>
                                    <input id="projectName" type="date" name="dateAffectation" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="projectName" style="font-weight: normal; font-size: medium;">Date debut</label>
                                    <input id="projectName" type="date" name="dateDebut" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="projectName" style="font-weight: normal; font-size: medium;">Date Fin</label>
                                    <input id="projectName" type="date" name="datefin" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label style="font-size: medium; font-weight: normal">Durée</label>
                                    <input type="number" class="form-control" name="duree" required placeholder="Durée en heur">
                                </div>
                                <div>
                                    <label style="font-weight: normal; font-size: medium;">Etat</label>
                                    <select name="etat" class="ui fluid dropdown form-control">
                                        <option value="0">active</option>
                                        <option value="1">suspendue</option>
                                        <option value="2">finie avec succés</option>
                                        <option value="3">escaladée</option>
                                    </select>
                                </div>
                                <div class="mt-md-3">
                                    <label style="font-weight: normal; font-size: medium;">Type tache</label>
                                    <select name="typeTache" class="ui fluid dropdown form-control">
                                        @foreach(\App\TypeTache::all() as $type)
                                            <option value="{{ $type->id_type_tache }}">{{ $type->libelle_type_tache }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-md-3">
                                    <label style="font-weight: normal; font-size: medium;">Ingénieur</label>
                                    <select name="engineer" class="ui fluid dropdown form-control">
                                        @foreach(\App\Ingenieur::all() as $ing)
                                            <option value="{{ $ing->id_profil }}">{{ $ing->nom . ' ' . $ing->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row justify-content-center mt-md-3">
                                    <button class="ui green button" type="submit">
                                        <i class="check icon"></i> Ajouter
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table col-md-12 mb-md-4">
                <table class="ui green table">
                    <thead>
                    <tr>
                        <th>Tache #</th>
                        <th>Date affectation</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Duree (heur)</th>
                        <th>Etat</th>
                        <th>Ingénieur</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taches as $tache)
                        <tr>
                            <td data-label="number">{{ $tache->id_tache }}</td>
                            <td data-label="project">{{ $tache->date_affectation_tache }}</td>
                            <td data-label="date debut">{{ $tache->date_debut_tache }}</td>
                            <td data-label="date fin">{{ $tache->date_fin_tache }}</td>
                            <td data-label="date fin">{{ $tache->duree}}</td>
                            <td data-label="date fin">@if($tache->etat == 0)
                                    active
                                @elseif($tache->etat  == 1)
                                    suspendue
                                @elseif($tache->etat  == 2)
                                    finie
                                @elseif($tache->etat  == 3)
                                    escaladée
                                @endif
                            </td>
                            <td data-label="date fin">{{ $tache->ingenieur->nom . ' ' . $tache->ingenieur->prenom }}</td>
                            <td data-label="date fin">{{ $tache->typeTache->libelle_type_tache }}</td>
                            <td data-label="Supprimer">
                                <div class="row flex-row justify-content-start">
                                    <div>
                                        <form class="supprimer delete" action="{{ route('manager.manage-task.destroy-tache-it', $tache->id_tache) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="glyphicon glyphicon-remove"></i>
                                                <strong>Supprimer</strong>
                                            </button>
                                        </form>
                                    </div>
{{--                                    <div>--}}
{{--                                        <div class="dropdown px-2">--}}
{{--                                            <button class="btn btn-md btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                <i class="clipboard icon"></i> Modifier--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown-menu" style="width: 250px;">--}}
{{--                                                <form class="px-4 py-3" method="post" action="#">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('PUT')--}}

{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
