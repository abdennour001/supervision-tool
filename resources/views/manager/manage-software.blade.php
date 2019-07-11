@extends('layouts.manager')

@section('content-manager')

    <div class="cover" style="background-color:black; width:100%; height:100%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green code icon"></i>
                <div class="content">
                    Liste software
                </div>
            </h2>
        </div>

        <div class="row justify-content-center my-md-3">
            @if($message = \Illuminate\Support\Facades\Session::get('add_message'))
                <div class="alert alert-success" id="message">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>


        <div class="container mt-md-3">
            <form action="{{ route('admin.software.add') }}" method="post">
                @csrf
                <div class="ui middle aligned center aligned grid form">
                    <div class="field form-group">
                        <label style="font-size: medium; font-weight: normal">Software</label>
                        <input type="text" name="software" class="input-ajouter form-control" placeholder="Software">
                    </div>
                    <div class="field form-group">
                        <label style="font-size: medium; font-weight: normal">Type software</label>
                        <select class="ui fluid dropdown form-control" name="type_software">
                            @foreach(\App\TypeSoftware::all() as $typeSoftware)
                                <option value="{{ $typeSoftware->id_type_software }}">{{ $typeSoftware->libelle_type_software }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field form-group">
                        <label style="font-size: medium; font-weight: normal">Serveur</label>
                        <select class="ui fluid dropdown form-control" name="serveur">
                            @foreach(\App\Serveur::all() as $server)
                                <option value="{{ $server->id_hardware }}">{{ $server->hostname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="ui two column centered grid">
                    <div class="four column centered row">
                        <div class="ui buttons">
                            <button class="ui right floated green button ajouter" type="submit">
                                <i class="pencil alternate icon"></i> Ajouter un software
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="table col-md-10 offset-md-1 mb-md-4">
                    <table class="ui red table">
                        <thead>
                        <tr><th>Software</th>
                            <th>Type software</th>
                            <th>Serveur</th>
                            <th>Supprimer</th>
                        </tr></thead>
                        <tbody>
                        @foreach($softwareList = \App\Software::query()->orderByDesc('created_at')->paginate(5)
                                 as $software)
                            <tr>
                                <td data-label="Software">{{ $software->nom_software }}</td>
                                <td data-label="TypeSoftware">{{ $software->typeSoftware->libelle_type_software }}</td>
                                <td data-label="dnmware-wataniya">{{ $software->serveur->hostname }}</td>
                                <td data-label="Supprimer">
                                    <div class="row flex-row justify-content-start">
                                        <div>
                                            <form class="supprimer" action="{{ route('admin.software.destroy',$software->id_software) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                    <strong>Supprimer</strong>
                                                </button>
                                            </form>
                                        </div>
                                        <div>
                                            <div class="dropdown px-2">
                                                <button class="btn btn-md btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="clipboard icon"></i> Modifier
                                                </button>
                                                <div class="dropdown-menu" style="width: 250px;">
                                                    <form class="px-4 py-3" method="post" action="{{ route("admin.software.update", $software->id_software) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label style="font-size: medium; font-weight: normal">Software</label>
                                                            <input type="text" value="{{ $software->nom_software }}" class="form-control" name="software" required placeholder="Software">
                                                        </div>

                                                        <div class="form-group">
                                                            <label style="font-size: medium; font-weight: normal">Type software</label>
                                                            <select class="ui fluid dropdown form-control" name="type_software">
                                                                @foreach(\App\TypeSoftware::all() as $typeSoftware)
                                                                    @if($typeSoftware->id_type_software == $software->typeSoftware->id_type_software)
                                                                        <option value="{{ $typeSoftware->id_type_software }}" selected>{{ $typeSoftware->libelle_type_software }}</option>
                                                                    @else
                                                                        <option value="{{ $typeSoftware->id_type_software }}">{{ $typeSoftware->libelle_type_software }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label style="font-size: medium; font-weight: normal">Serveur</label>
                                                            <select class="ui fluid dropdown form-control" name="serveur">
                                                                @foreach(\App\Serveur::all() as $server)
                                                                    <option value="{{ $server->id_hardware }}">{{ $server->hostname }}</option>
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
    </div>

    <script>
        $(document).ready(function() {

            let dropdown = $('.dropdown');

            dropdown.on('show.bs.dropdown', function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeIn(500);
                $(".cover").fadeTo(500, 0.5);
            });

            dropdown.on('hide.bs.dropdown', function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeOut(500);
                $(".cover").fadeOut(500);
            });

            $('.ajouter').click(function() {
                let $this = $(this);    // reference to the current scope
                let val = $('.input-ajouter').val();
                if (!val) {
                    jconfirm({
                        title: 'Nom software',
                        content: 'Veuillez vous entrer un nom du software.',
                        type: 'red',
                        icon:'glyphicon glyphicon-exclamation-sign',
                        typeAnimated: true,
                        buttons: {
                            ok: {
                                text: 'Continuer',
                                btnClass: 'btn-red',
                                keys: ['enter', 'shift'],
                                action: function(){
                                    return true;
                                }
                            }
                        }

                    });
                    return false;
                }
                $this.off('submit').submit();
            });


            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);

            $('.supprimer').on('click', function() {
                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer ce software?',
                    type: 'red',
                    typeAnimated: true,
                    icon:'glyphicon glyphicon-exclamation-sign',
                    buttons: {
                        confirm: {
                            btnClass: 'btn-red',
                            action : function () {
                                $this.off('submit').submit();
                            }
                        },
                        cancel: function () {
                        },
                    }
                });
                return false;
            });

            let msg = '{{Session::get('delete_message')}}';
            let exist = '{{Session::has('delete_message')}}';
            if(exist){
                jconfirm({
                    title: 'Type software supprimé',
                    content: msg,
                    type: 'green',
                    typeAnimated: true,
                    icon:'glyphicon glyphicon-ok-sign',
                    buttons: {
                        ok: {
                            text: 'Continuer',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function(){
                                return true;
                            }
                        }
                    }

                });
            }

            let msg_update = '{{Session::get('update_message')}}';
            let exist_update = '{{Session::has('update_message')}}';
            if(exist_update){
                jconfirm({
                    title: 'Type software Modifié',
                    content: msg_update,
                    type: 'green',
                    typeAnimated: true,
                    icon:'glyphicon glyphicon-ok-sign',
                    buttons: {
                        ok: {
                            text: 'Continuer',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function(){
                                return true;
                            }
                        }
                    }

                });
            }
        })
    </script>

@endsection