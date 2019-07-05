@extends('layouts.admin')

@section('content-admin')

    <div class="cover" style="background-color:black; width:100%; height:200%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green hdd icon"></i>
                <div class="content">
                    Liste hardware
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

        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">

                    <div class="dropdown px-2">
                        <button class="btn btn-lg btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="pencil square icon"></i> Nouvelle référence hardware
                        </button>
                        <div class="dropdown-menu">
                            <form class="px-4 py-3" method="post" action="{{ route('admin.hardware.marque-hardware.add') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1" style="font-size: medium;" >Constructeur</label>
                                    <input type="text" name="constructeur" class="form-control" required id="exampleDropdownFormEmail1" placeholder="Constructeur">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1" style="font-size: medium;">Réference</label>
                                    <input type="text" name="reference" class="form-control" required id="exampleDropdownFormPassword1" placeholder="Réference">
                                </div>
                                <div class="form-group">
                                    <label for="select" style="font-size: medium;">Type hardware</label>
                                    <select id="select" name="type_hardware" class="ui fluid dropdown">
                                        @foreach($typesHardware = \App\TypeHardware::all()->sortByDesc('created_at')
                                                as $typeHardware)
                                            <option value="{{ $typeHardware->libelle_type_hardware }}">
                                                {{ $typeHardware->libelle_type_hardware }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="ajouterMarque" class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                    </div>
                    </div>
                    <div class="dropdown px-2">
                            <button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="pencil square icon"></i> Nouveau type hardware
                            </button>
                            <div class="dropdown-menu">
                                <form class="px-4 py-3" method="post" action="{{ route("admin.hardware.type-hardware.add") }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleDropdownFormEmail1" style="font-size: medium;">Libelle type hardware</label>
                                        <input type="text"  name="hardwareType" class="form-control input-ajouter" placeholder="Libelle type hardware">
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary ajouter">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <div class="dropdown px-2">
                            <button class="btn btn-lg btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-remove"></span>
                                Supprimer type hardware
                                </button>
                            <div class="dropdown-menu py-4" style="width: 200px;">
                                <form id="deleteTypeForm" class="px-4" action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <label for="deleteSelect" style="font-size: medium;">Type hardware</label>
                                        <select id="deleteSelect" class="ui fluid dropdown">
                                            @foreach($typesHardware = \App\TypeHardware::all()->sortByDesc('created_at')
                                                   as $typeHardware)
                                                <option value="{{ $typeHardware->id_type_hardware }}">
                                                    {{ $typeHardware->libelle_type_hardware }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button id="deleteTypeButton" class="btn btn-danger" type="submit">
                                            <i class="glyphicon glyphicon-remove"></i>
                                            <strong>Supprimer</strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 offset-md-1 my-md-3">
                        <div class="row">
                            <div class="col-md-2" style="font-size: large; margin-top: 5px;">
                                <strong>List des références</strong>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label style="font-size: medium;">Rechecher par type hardware</label>
                                    </div>
                                    <div class="col-md-push-4">
                                        <select id="searchDropdown" class="ui fluid dropdown">
                                            @foreach($typesHardware = \App\TypeHardware::all()->sortByDesc('created_at')
                                                as $typeHardware)
                                                <option value="{{ $typeHardware->libelle_type_hardware }}">
                                                    {{ $typeHardware->libelle_type_hardware }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table col-md-10 offset-md-1 mb-md-4">

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        $(document).ready(function() {

            fetch_marque_hardware_data($('#searchDropdown').val());

            $('#searchDropdown').change(function() {
                fetch_marque_hardware_data($('#searchDropdown').val());
            });

            // ajax search function
            function fetch_marque_hardware_data(query = '') {
                $.ajax({
                    url:"{{ route('admin.hardware.marque-hardware.search') }}",
                    method: 'GET',
                    data: {query:query},
                    dataType: 'text',
                    success:function(data) {
                        $(".table").html(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                })
            }

            function getPage(url, query) {
                $.ajax({
                    url : url,
                    data: {query: query},
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                }).done(function (data) {
                    $('.table').html(data);
                })
            }

            // Override the pagination
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                let url = $(this).attr('href');
                getPage(url, $('#searchDropdown').val());
                window.history.pushState("", "", "");
            });


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

            $('.supprimer').on('click', function() {
                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer ce type de hardware?',
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

            $('body').on('click', '.supprimer_marque', function () {
                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer cette marque de hardware?',
                    type: 'red',
                    icon:'glyphicon glyphicon-exclamation-sign',
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            btnClass: 'btn-red',
                            action : function () {
                                $this.parent().submit();
                            }
                        },
                        cancel: function () {
                        },
                    }
                });
                return false;
            });

            $('.ajouter').click(function() {
                let $this = $(this);    // reference to the current scope
                let val = $('.input-ajouter').val();
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

            $('#deleteTypeButton').on('click', function() {

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer ce type de hardware?',
                    type: 'red',
                    icon:'glyphicon glyphicon-exclamation-sign',
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            btnClass: 'btn-red',
                            action : function () {
                                let form=$('#deleteTypeForm');
                                form.attr('action', '/admin/hardware/type-hardware/' + $('#deleteSelect option:selected').val());
                                form.off('submit').submit();
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
                    title: 'Type hardware supprimé',
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

            let msg_marque = '{{Session::get('delete_marque_message')}}';
            let exist_marque = '{{Session::has('delete_marque_message')}}';
            if(exist_marque){
                jconfirm({
                    title: 'Marque hardware supprimé',
                    content: msg_marque,
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