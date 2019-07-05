@extends('layouts.admin')

@section('content-admin')

    <div class="cover" style="background-color:black; width:100%; height:200%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="green code icon"></i>
                <div class="content">
                    Liste type software
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

        <form action="{{ route('admin.software.type-software.add') }}" method="post">
            @csrf
            <div class="row mt-md-3 justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="d-flex">
                            <div>
                                <label for="type" class="mt-2 mx-4" style="font-size: medium;">Type software</label>
                            </div>
                            <div>
                                <input id="type" class="form-control type-input" type="text" name="softwareType" placeholder="Type software">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ui buttons">
                        <button class="ui green button form-control ajouter-type">
                            <i class="plus icon"></i> Ajouter un type software
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <br>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="ui red table">
                    <thead>
                    <tr>
                        <th>Type software</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($typesSoftware = \Illuminate\Support\Facades\DB::table('type_software')
                    ->orderByDesc('created_at')
                    ->paginate(5)
                    as $typeSoftware)

                        <tr>
                            <td data-label="TypeSoftware">{{ $typeSoftware->libelle_type_software }}</td>
                            <td data-label="Supprimer">

                                <div class="container pt-sm-2">
                                    <div class="row flex-row justify-content-start">
                                        <div class="col-m-6">
                                            <form class="delete" action="{{ route('admin.software.type-software.destroy', $typeSoftware->id_type_software) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                    <strong>Supprimer</strong>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-m-6">
                                            <div class="dropdown px-2">
                                                <button class="btn btn-md btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="clipboard icon"></i> Modifier
                                                </button>
                                                <div class="dropdown-menu" style="width: 300px;">
                                                    <form class="px-4 py-3" method="post" action="{{ route("admin.software.type-software.update", $typeSoftware->id_type_software) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="exampleDropdownFormEmail1" style="font-size: medium;">Libelle type software</label>
                                                            <input type="text" name="softwareType" class="form-control input-modify" placeholder="Libelle type software" value="{{ $typeSoftware->libelle_type_software }}">
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
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                <div class="row justify-content-center">
                    {{ $typesSoftware->links() }}
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {

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

            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);

            $('.ajouter-type').click(function() {
                let $this = $(this);    // reference to the current scope
                let val = $('.type-input').val();
                if (!val) {
                    jconfirm({
                        title: 'Type software',
                        content: 'Veuillez vous entrer un type software.',
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

            $('.modify').click(function() {
                let $this = $(this);    // reference to the current scope
                let val = $('.input-modify').val();
                if (!val) {
                    jconfirm({
                        title: 'Type software',
                        content: 'Veuillez vous entrer un type software.',
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


            $('.delete').on("click", function (event) {

                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation',
                    content: 'Êtes-vous sûr de supprimer ce Type?',
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

        });
    </script>


@endsection