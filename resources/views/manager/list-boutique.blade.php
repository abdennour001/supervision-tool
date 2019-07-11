@extends('layouts.manager')

@section('content-manager')

    <div class="cover" style="background-color:black; width:100%; height:200%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green warehouse icon"></i>
                <div class="content">
                    Liste boutique
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


        <form action="{{ route('manager.list-boutique.store') }}" method="post" class="mt-md-4">
            @csrf
            <div class="ui middle aligned center aligned grid form">
                <div class="field">
                    <label style="font-size: medium; font-weight: normal;">Nom boutique</label>
                    <input class="form-control" type="text" name="nomBoutique" placeholder="Nom boutique" value="{{ old('nomBoutique') }}">
                    @if($errors->has('nomBoutique'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('nomBoutique') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="field">
                    <label style="font-size: medium; font-weight: normal;">Adresse boutique</label>
                    <input class="form-control" type="text" name="adresseBoutique" placeholder="Adresse boutique" value="{{ old('adresseBoutique') }}">
                    @if($errors->has('adresseBoutique'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('adresseBoutique') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="field">
                    <label style="font-size: medium; font-weight: normal;">Adresse IP du boutique</label>
                    <input class="form-control" type="text" name="IPBoutique" placeholder="Adresse IP du boutique" value="{{ old('IPBoutique') }}">
                    @if($errors->has('IPBoutique'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('IPBoutique') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="ui two column centered grid">
                <div class="four column centered row">
                    <div class="ui buttons">
                        <button class="ui right floated green button" type="submit">
                            <i class="pencil alternate icon"></i> Ajouter boutique
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="container">
            <div class="row">
                <div class="table col-md-10 offset-md-1 mb-md-4 mt-md-2">
                    <table class="ui red table">
                        <thead>
                        <tr><th>Nom boutique</th>
                            <th>Adresse boutique</th>
                            <th>Passerelle</th>
                            <th>Supprimer</th>
                        </tr></thead>
                        <tbody>
                        @foreach($boutiqueList = \App\Boutique::query()->orderByDesc('created_at')->paginate(5)
                        as $boutique)
                            <tr>
                                <td data-label="nomBoutique">{{ $boutique->nom_boutique }}</td>
                                <td data-label="adresseBoutique">{{ $boutique->address_boutique }}</td>
                                <td data-label="passerelle">{{ $boutique->hardware->snmpaddr }}</td>
                                <td data-label="Supprimer">
                                    <div class="container pt-sm-2">
                                        <div class="row flex-row justify-content-start">
                                            <div class="col-m-6">
                                                <form class="delete" action="{{ route('manager.list-boutique.delete', $boutique->id_boutique) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="glyphicon glyphicon-remove"></i>
                                                        <strong>Supprimer</strong>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-m-6">
                                                <div class="dropdown dropleft px-2">
                                                    <button class="btn btn-md btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="clipboard icon"></i> Modifier
                                                    </button>
                                                    <div class="dropdown-menu" style="width: 250px;">
                                                        <form class="px-4 py-3" method="post" action="{{ route('manager.list-boutique.update', $boutique->id_boutique) }}">
                                                            @csrf
                                                            @method('PUT')
                                                                <div class="form-group">
                                                                    <label style="font-size: medium; font-weight: normal;">Nom boutique</label>
                                                                    <input required class="form-control" type="text" name="nomBoutique" placeholder="Nom boutique" value="{{ $boutique->nom_boutique }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label style="font-size: medium; font-weight: normal;">Adresse boutique</label>
                                                                    <input required class="form-control" type="text" name="adresseBoutique" placeholder="Adresse boutique" value="{{ $boutique->address_boutique }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label style="font-size: medium; font-weight: normal;">Adresse IP du boutique</label>
                                                                    <input required class="form-control" type="text" name="IPBoutique" placeholder="Adresse IP du boutique" value="{{ $boutique->hardware->snmpaddr }}">
                                                                </div>
                                                            <div class="row justify-content-center">
                                                                <button type="submit" class="btn btn-success modify">Modifier</button>
                                                            </div>
                                                        </form>
                                                    </div>
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
                        {{$boutiqueList->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);

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

            $('.delete').on("click", function (event) {

                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation',
                    content: 'Êtes-vous sûr de supprimer cette boutique?',
                    type: 'red',
                    icon:'glyphicon glyphicon-question-sign',
                    typeAnimated: true,
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