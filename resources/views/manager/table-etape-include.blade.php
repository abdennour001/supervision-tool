<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 my-md-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="pt-md-2">
                            <button class="btn btn-success rounded-circle return-etape">
                                <i class="glyphicon glyphicon-arrow-left" style="font-size: large;"></i>
                            </button>
                        </div>
                        <div style="font-weight: normal; font-size: large; margin-top: 15px;">
                            {{ $project->nom_projet }} >
                        </div>
                    </div>
                    <div class="dropdown dropleft">
                        <button class="btn btn-sm add add-hard" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: x-large;">
                            <i class="green add piece icon"></i>
                        </button>
                        <div class="dropdown-menu mr-md-5" style="width: 250px; margin-right: 100px;">
                            <form class="px-4 py-3" method="post" action="{{ route('manager.manage-etape.store', $project->id_projet) }}">
                                @csrf
                                <div class="mb-md-2">
                                    <label style="font-size: large; font-weight: bold">Ajouter une étape</label>
                                </div>
                                <div class="form-group">
                                    <label style="font-size: medium; font-weight: normal">Nom</label>
                                    <input type="text" class="form-control" name="nom" required placeholder="Nom étape">
                                </div>
                                <div class="form-group">
                                    <label for="projectName" style="font-weight: normal; font-size: medium;">Date debut</label>
                                    <input id="projectName" type="date" name="dateDebut" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="projectName" style="font-weight: normal; font-size: medium;">Date Fin</label>
                                    <input id="projectName" type="date" name="datefin" class="form-control" required>
                                </div>
                                <div>
                                    <label style="font-weight: normal; font-size: medium;">Priorité</label>
                                    <select name="priorite" class="ui fluid dropdown form-control">
                                        <option value="0">faible</option>
                                        <option value="1">moyenne</option>
                                        <option value="2">urgente</option>
                                        <option value="3">critique</option>
                                    </select>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-start my-md-3">
                                        <input class="mr-md-3" type="checkbox" name="livree">
                                        <label class="mt-md-1" style="font-weight: normal; font-size: medium;">Livrée</label>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
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
                        <th>Etape #</th>
                        <th>Nom</th>
                        <th>Date début</th>
                        <th>Date échéance</th>
                        <th>Priorité</th>
                        <th>Livrée</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($etapes as $etape)
                        <tr>
                            <td data-label="number">{{ $etape->id_etape }}</td>
                            <td data-label="project">{{ $etape->nom_etape }}</td>
                            <td data-label="date debut">{{ $etape->date_debut_etape }}</td>
                            <td data-label="date fin">{{ $etape->date_echeance_etape }}</td>
                            <td data-label="date fin">@if($etape->priorite == 0)
                                    faible
                                @elseif($etape->priorite == 1)
                                    moyenne
                                @elseif($etape->priorite == 2)
                                    urgente
                                @elseif($etape->priorite == 3)
                                    critique
                                @endif
                            </td>
                            <td data-label="date fin">{{ $etape->livree == 1 ? 'Oui' : 'Non' }}</td>
                            <td data-label="Supprimer">
                                <div class="row flex-row justify-content-start">
                                    <div class="px-2">
                                        <form class="supprimer delete" action="{{ route('manager.manage-etape.destroy', $etape->id_etape) }}" method="post">
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
                                    <div>
                                        <button class="btn btn-success afficher-etape" type="submit" etape="{{ $etape->id_etape }}">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <strong>Afficher</strong>
                                        </button>
                                    </div>
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
