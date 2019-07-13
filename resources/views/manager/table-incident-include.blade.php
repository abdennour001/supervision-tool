<table class="ui red table">
    <thead>
    <tr>
        <th>Incident</th>
        <th>Description</th>
        <th>Date</th>
        <th>Etat</th>
        <th>Sévérité</th>
        <th>Software</th>
        <th>Hardware</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if(count($incidents) == 0)
        <tr>
            <td class="justify-content-center" colspan="3">Aucune donnée disponible</td>
        </tr>
    @endif
    @foreach($incidents as $inc)
        <tr>
            <td>{{ $inc->id_incident }}</td>
            <td>{{ $inc->descriptif_incident }}</td>
            <td>{{ $inc->date_incident }}</td>
            <td>
                @if($inc->etat_incident == 0)
                    non-résolu
                @elseif($inc->etat_incident == 1)
                    diagnostiqué
                @elseif($inc->etat_incident == 2)
                    résolu
                @endif
            </td>
            <td>
                @if($inc->severite == 0)
                    faible
                @elseif($inc->severite == 1)
                    moyenne
                @elseif($inc->severite == 2)
                    urgente
                @elseif($inc->severite == 3)
                    critique
                @endif
            </td>
            <td>{{ $inc->software != NULL ? $inc->software->nom_software : 'N/S' }}</td>
            <td>{{ $inc->hardware != NULL ? $inc->hardware->hostname : 'N/S' }}</td>
            <td>
                <div class="row flex-row justify-content-start">
                    <div>
                        <form class="supprimer" action="{{ route('manager.list-incident.delete', $inc->id_incident) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="glyphicon glyphicon-remove"></i>
                                <strong>Supprimer</strong>
                            </button>
                        </form>
                    </div>
                    <div>
                        <div class="dropdown dropleft px-2">
                            <button class="btn btn-md btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="clipboard icon"></i> Modifier
                            </button>
                            <div class="dropdown-menu" style="width: 250px;">
                                <form class="px-4 py-3" method="post" action="{{ route('manager.list-incident.update', $inc->id_incident) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="field">
                                        <label style="font-weight: normal; font-size: medium;">Software</label>
                                        <select name="software" class="ui fluid dropdown form-control">
                                            @foreach(\App\Software::all() as $software)
                                                @if(($inc->software != NULL) and ($software->id_software == $inc->software->id_software))
                                                    <option value="{{ $software->id_software }}" selected>{{ $software->nom_software }}</option>
                                                @else
                                                    <option value="{{ $software->id_software }}">{{ $software->nom_software }}</option>
                                                @endif
                                            @endforeach
                                            @if($inc->software == NULL)
                                                    <option value="-1" selected>N/S</option>
                                                @else
                                                    <option value="-1">N/S</option>
                                                @endif
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label style="font-weight: normal; font-size: medium;">Hardware</label>
                                        <select name="hardware" class="ui fluid dropdown form-control">
                                            @foreach(\App\Hardware::all() as $hardware)
                                                @if(($inc->hardware != NULL) and ($hardware->id_hardware == $inc->hardware->id_hardware))
                                                    @if($hardware->hostname != NULL)
                                                        <option value="{{ $hardware->id_hardware }}" selected>{{ $hardware->hostname }}</option>
                                                    @endif
                                                @else
                                                    @if($hardware->hostname != NULL)
                                                        <option value="{{ $hardware->id_hardware }}">{{ $hardware->hostname }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                                @if($inc->hardware == NULL)
                                                    <option value="-1" selected>N/S</option>
                                                @else
                                                    <option value="-1">N/S</option>
                                                @endif
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label style="font-weight: normal; font-size: medium;">Etat</label>
                                        <select name="etat" class="ui fluid dropdown form-control">
                                            <option value="0" {{ $inc->etat_incident == 0 ? 'selected' : ''}}>non-résolu</option>
                                            <option value="1" {{ $inc->etat_incident == 1 ? 'selected' : ''}}>diagnostiqué</option>
                                            <option value="2" {{ $inc->etat_incident == 3 ? 'selected' : ''}}>résolu</option>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label style="font-weight: normal; font-size: medium;">Séverité</label>
                                        <select name="severite" class="ui fluid dropdown form-control">
                                            <option value="0" {{ $inc->severite == 0 ? 'selected' : ''}}>faible</option>
                                            <option value="1" {{ $inc->severite == 1 ? 'selected' : ''}}>moyenne</option>
                                            <option value="2" {{ $inc->severite == 2 ? 'selected' : ''}}>urgente</option>
                                            <option value="3" {{ $inc->severite == 3 ? 'selected' : ''}}>critique</option>
                                        </select>
                                    </div>
                                    <div class="row justify-content-center mt-md-3">
                                        <button class="btn btn-primary" type="submit" style="font-size: medium; font-weight: normal;">
                                            Modifier
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="row justify-content-center">
    {{ $incidents->links() }}
</div>
