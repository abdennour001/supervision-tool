@extends('layouts.admin')

@section('content-admin')

    <div class="cover" style="background-color:black; width:100%; height:150%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="green thumbtack icon"></i>
                <div class="content">
                    Liste des familles types de tâche
                </div>
            </h2>
        </div>

        @if($message = \Illuminate\Support\Facades\Session::get('add_message'))
            <div class="row justify-content-center my-md-3">
                <div class="alert alert-success" id="message">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.manage-task.add-famille-type-tache') }}" method="post" class="my-md-3">
            @csrf
            <div class="ui middle aligned center aligned grid form">
                <div class="inline field">
                    <label style="font-weight: normal; font-size: medium">Famille type tâche</label>
                    <input class="form-control input-ajouter" type="text" name="famille" placeholder="Famille type tâche">
                </div>
            </div>
            <div class="ui two column centered grid">
                <div class="four column centered row">
                    <div class="ui buttons">
                        <button class="ui green button ajouter" type="submit">
                            <i class="plus icon"></i> Ajouter une famille type tâche
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="container">
            <div class="row">
                <div class="table col-md-8 offset-md-2 mb-md-4 mt-md-2">
                    <table class="ui red table">
                        <thead>
                        <tr>
                            <th>Famille Type tâche</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($familles = \App\FamilleTypeTache::query()->orderByDesc('created_at')->paginate(5) as $famille)
                            <tr>
                                <td data-label="TaskType">{{ $famille->libelle_famille_type_tache }}</td>
                                <td data-label="Supprimer">
                                    <div class="row flex-row justify-content-start">
                                        <div>
                                            <form class="supprimer" action="{{route('admin.manage-task.delete-famille-type-tache', $famille->id_famille_type_tache)}}" method="post">
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
                                                    <form class="px-4 py-3" method="post" action="{{ route('admin.manage-task.update-famille-type-tache', $famille->id_famille_type_tache) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label style="font-size: medium; font-weight: normal">Famille type Tâche</label>
                                                            <input type="text" value="{{ $famille->libelle_famille_type_tache }}" class="form-control" name="famille" required placeholder="Famille type tache">
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
                        {{ $familles->links() }}
                    </div>

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


            $('.ajouter').click(function() {
                let $this = $(this);    // reference to the current scope
                let val = $('.input-ajouter').val();
                if (!val) {
                    jconfirm({
                        title: 'Famille des Tâche',
                        content: 'Veuillez vous entrer un nom du famille.',
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
                    content: 'Êtes-vous sûr de supprimer cette famille?',
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
                    title: 'Famille supprimé',
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
                    title: 'Famille Modifié',
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