<div class="ui middle aligned center aligned grid form mt-md-3">
    <div class="inline field">
        <label style="font-weight: bold; font-size: medium">Type tâche :</label>
        <label style="font-weight: normal; font-size: medium">{{ $type->libelle_type_tache }}</label>
    </div>
    <div class="inline field">
        <label style="font-weight: bold; font-size: medium">Seuil :</label>
        <label style="font-weight: normal; font-size: medium">{{ $type->seuil }}</label>
    </div>
    <div class="inline field">
        <label style="font-weight: bold; font-size: medium">Famille type tâche :</label>
        <label style="font-weight: normal; font-size: medium">{{ $type->familleTypeTache->libelle_famille_type_tache }}</label>
    </div>

</div>

<div class="ui two column centered grid">
    <div class="four column centered row">
        <div class="row justify-content-center">
            <div class="ui green button mx-md-2 modify">
                <i class="plus icon"></i> Ajouter un type tâche
            </div>
            <div>
                <div class="dropdown px-2">
                    <button class="ui blue button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="pencil alternate icon"></i> Modifier
                    </button>
                    <div class="dropdown-menu" style="width: 250px;">
                        <form class="px-4 py-3" method="post" action="{{ route('admin.manage-task.update-type-tache', $type->id_type_tache) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label style="font-size: medium; font-weight: normal">Type Tâche</label>
                                <input type="text" value="{{ $type->libelle_type_tache }}" class="form-control" name="taskType" required placeholder="Type tache">
                            </div>

                            <div class="form-group">
                                <label style="font-size: medium; font-weight: normal;">Seuil (minutes)</label>
                                <input class="form-control" type="range" value="{{ $type->seuil }}" name="SeuilIn" id="SeuilInput" min="0" max="120" oninput="SeuilOutput.value = SeuilInput.value">
                                <output for="Seuil" name="SeuilOut" id="SeuilOutput" style="font-size: medium; font-weight: normal;">{{ $type->seuil }}</output>
                            </div>

                            <div class="form-group">
                                <label style="font-size: medium; font-weight: normal">Famille type tâche</label>
                                <select class="ui fluid dropdown form-control" name="famille">
                                    @foreach(\App\FamilleTypeTache::all() as $famille)
                                        <option value="{{ $famille->id_famille_type_tache }}">{{ $famille->libelle_famille_type_tache }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary modify">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="table col-md-8 offset-md-2 mb-md-4 mt-md-2">
            <div class="d-flex justify-content-between">
                <div>
                    <label style="font-weight: bold; font-size: medium">Types de hardware associé :</label>
                </div>
                <div>
                    <div class="dropdown dropleft">
                        <button class="btn btn-sm add add-hard" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: large;">
                            <i class="green add piece icon"></i>
                        </button>
                        <div class="dropdown-menu mr-md-5" style="width: 250px; margin-right: 100px;">
                            <form class="px-4 py-3" method="post" action="{{ route('admin.manage-task.associate-hardware', $type->id_type_tache) }}">
                                @csrf
                                <div class="form-group">
                                    <label style="font-size: medium; font-weight: normal;">Type Hardware</label>
                                    <select class="ui fluid dropdown form-control" name="type_hard">
                                        @foreach(\App\TypeHardware::all() as $typeHard)
                                            <option value="{{ $typeHard->id_type_hardware }}">{{ $typeHard->libelle_type_hardware }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary modify">Associer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="ui red table">
                <thead>
                <tr>
                    <th>Nom hardware</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hardwareList = $type->typesHardware()->paginate(4, ['*'], 'hardware') as $hardware)
                    <tr>
                        <td data-label="TaskType">{{ $hardware->libelle_type_hardware }}</td>
                        <td data-label="Supprimer">
                            <div class="row flex-row justify-content-start">
                                <div>
                                    <form class="supprimer" action="{{ route('admin.manage-task.disassociate-hardware', ['id_type_tache' => $type->id_type_tache, 'id_type_hardware' => $hardware->id_type_hardware]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="glyphicon glyphicon-remove"></i>
                                            <strong>Supprimer</strong>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row justify-content-center">
                {{ $hardwareList->links() }}
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="table col-md-8 offset-md-2 mb-md-4 mt-md-2">
            <div class="d-flex justify-content-between">
                <div>
                    <label style="font-weight: bold; font-size: medium">Types de software associé :</label>
                </div>
                <div>
                    <div class="dropdown dropleft">
                        <button class="btn btn-sm add add-hard" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: large;">
                            <i class="green add piece icon"></i>
                        </button>
                        <div class="dropdown-menu mr-md-5" style="width: 250px; margin-right: 100px;">
                            <form class="px-4 py-3" method="post" action="{{ route('admin.manage-task.associate-software', $type->id_type_tache) }}">
                                @csrf
                                <div class="form-group">
                                    <label style="font-size: medium; font-weight: normal;">Type Software</label>
                                    <select class="ui fluid dropdown form-control" name="type_soft">
                                        @foreach(\App\TypeSoftware::all() as $typeSoft)
                                            <option value="{{ $typeSoft->id_type_software }}">{{ $typeSoft->libelle_type_software }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary modify">Associer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="ui red table">
                <thead>
                <tr>
                    <th>Nom software</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($softwareList = $type->typesSoftware()->paginate(4, ['*'], 'software') as $software)
                    <tr>
                        <td data-label="TaskType">{{ $software->libelle_type_software }}</td>
                        <td data-label="Supprimer">
                            <div class="row flex-row justify-content-start">
                                <div>
                                    <form class="supprimer" action="{{ route('admin.manage-task.disassociate-software', ['id_type_tache' => $type->id_type_tache, 'id_type_software' => $software->id_type_software]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="glyphicon glyphicon-remove"></i>
                                            <strong>Supprimer</strong>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                {{ $softwareList->links() }}
            </div>
        </div>
    </div>
</div>