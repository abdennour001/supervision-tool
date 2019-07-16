<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 my-md-3">
                <div class="row">
                    <div class="col-md-6" style="font-weight: normal; font-size: large; margin-top: 5px;">
                        Liste des projets
                    </div>
                </div>
            </div>
            <div class="table col-md-12 mb-md-4">
                <table class="ui green table">
                    <thead>
                    <tr>
                        <th>Projet #</th>
                        <th>Nom</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projets as $projet)
                        <tr>
                            <td data-label="number">{{ $projet->id_projet }}</td>
                            <td data-label="project">{{ $projet->nom_projet }}</td>
                            <td data-label="date debut">{{ $projet->date_lancement_projet }}</td>
                            <td data-label="date fin">{{ $projet->date_fin_projet }}</td>
                            <td data-label="Supprimer">
                                <div class="row flex-row justify-content-start">
                                    <div class="px-2">
                                        <form class="supprimer delete" action="{{ route('manager.project.delete', $projet->id_projet) }}" method="post">
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
{{--                                                <form class="px-4 py-3" method="post" action="{{ route("manager.project.update", $projet->id_projet) }}">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('PUT')--}}

{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div>
                                        <button class="btn btn-success afficher" type="submit" project="{{ $projet->id_projet }}">
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
