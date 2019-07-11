@extends('layouts.admin')

@section('content-admin')

    <div class="cover" style="background-color:black; width:100%; height:150%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="green clipboard list icon"></i>
                <div class="content">
                    Liste des types de tâches
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

        <form action="{{ route('admin.manage-task.add-type-tache') }}" method="post">
            @csrf

            <div class="ui middle aligned center aligned grid form mt-md-3">
                <div class="inline field">
                    <label style="font-size: medium; font-weight: normal;">Type tâche</label>
                    <input type="text" name="taskType" placeholder="Type tâche" class="form-control input-ajouter">
                </div>
                <div class="inline field">
                    <label style="font-size: medium; font-weight: normal;">Seuil (minutes)</label>
                    <input class="form-control" type="range" name="SeuilIn" id="SeuilInput" min="0" max="120" oninput="SeuilOutput.value = SeuilInput.value">
                    <output for="Seuil" name="SeuilOut" id="SeuilOutput" style="font-size: medium; font-weight: normal;">24</output>
                </div>
                <div class="inline field">
                    <label style="font-size: medium; font-weight: normal">Famille type tâche</label>
                    <select class="ui fluid dropdown form-control" name="famille">
                        @foreach(\App\FamilleTypeTache::all() as $famille)
                            <option value="{{ $famille->id_famille_type_tache }}">{{ $famille->libelle_famille_type_tache }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="ui two column centered grid">
                <div class="four column centered row">
                    <div class="ui buttons">
                        <button class="ui green button ajouter" type="submit">
                            <i class="plus icon"></i> Ajouter un type tâche
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
                        <tr>
                            <th>Type tâche</th>
                            <th>Seuil (minutes)</th>
                            <th>Famille type tâche</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types = \App\TypeTache::query()->orderByDesc('created_at')->paginate(5) as $type)
                            <tr>
                                <td data-label="TaskType">{{ $type->libelle_type_tache }}</td>
                                <td data-label="Seuil">{{ $type->seuil }}</td>
                                <td>{{ $type->familleTypeTache->libelle_famille_type_tache }}</td>
                                <td data-label="Supprimer">
                                    <div class="row flex-row justify-content-start">
                                        <div>
                                            <form class="supprimer" action="{{route('admin.manage-task.delete-type-tache', $type->id_type_tache)}}" method="post">
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
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-center">
                        {{ $types->links() }}
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
                        title: 'Type Tâche',
                        content: 'Veuillez vous entrer un nom du type tâche.',
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
                    content: 'Êtes-vous sûr de supprimer ce Type de tâche?',
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
                    title: 'Type tache supprimé',
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
                    title: 'Type tache Modifié',
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