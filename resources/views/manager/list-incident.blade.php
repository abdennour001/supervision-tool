@extends('layouts.manager')

@section('content-manager')

    <div class="cover" style="background-color:black; width:100%; height:200%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green sticky note icon"></i>
                <div class="content">
                    Liste des incidents
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

            <form class="ui middle aligned center aligned grid my-md-4" action="{{ route('manager.list-incident.store') }}" method="post">
                @csrf
                <div class="inline field">
                    <label style="font-weight: normal; font-size: medium;">Description</label>
                    <input class="form-control" type="text" name="description" placeholder="Description" required>
                </div>
                <div class="inline field">
                    <label style="font-weight: normal; font-size: medium;">Software</label>
                    <select name="software" class="ui fluid dropdown form-control">
                        @foreach(\App\Software::all() as $software)
                            <option value="{{ $software->id_software }}">{{ $software->nom_software }}</option>
                        @endforeach
                            <option value="-1">N/S</option>
                    </select>
                </div>
                <div class="inline field">
                    <label style="font-weight: normal; font-size: medium;">Hardware</label>
                    <select name="hardware" class="ui fluid dropdown form-control">
                        @foreach(\App\Hardware::all() as $hardware)
                            @if($hardware->hostname != NULL)
                                <option value="{{ $hardware->id_hardware }}">{{ $hardware->hostname }}</option>
                            @endif
                        @endforeach
                            <option value="-1">N/S</option>
                    </select>
                </div>
                <div class="inline field">
                    <label style="font-weight: normal; font-size: medium;">Etat</label>
                    <select name="etat" class="ui fluid dropdown form-control">
                        <option value="0">non-résolu</option>
                        <option value="1">diagnostiqué</option>
                        <option value="2">résolu</option>
                    </select>
                </div>
                <div class="inline field">
                    <label style="font-weight: normal; font-size: medium;">Séverité</label>
                    <select name="severite" class="ui fluid dropdown form-control">
                        <option value="0">faible</option>
                        <option value="1">moyenne</option>
                        <option value="2">urgente</option>
                        <option value="3">critique</option>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-danger" type="submit" style="font-size: medium; font-weight: normal;">
                        Signaler
                    </button>
                </div>
            </form>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 my-md-3">
                        <div class="row">
                            <div class="col-md-2" style="font-size: large; margin-top: 5px;">
                                <strong>List des incidents</strong>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label style="font-size: medium;">Rechecher par état</label>
                                    </div>
                                    <div class="col-md-push-4">
                                        <select id="searchDropdown" class="ui fluid dropdown">
                                            <option value="0">non-résolu</option>
                                            <option value="1">diagnostiqué</option>
                                            <option value="2">résolu</option>
                                            <option value="i">source identifiée</option>
                                            <option value="n">source non identifiée</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table col-md-12 mb-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            let dropdown = $('.dropdown');

            $('body').on('show.bs.dropdown', dropdown, function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeIn(500);
                $(".cover").fadeTo(500, 0.5);
            });

            $('body').on('hide.bs.dropdown', dropdown, function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeOut(500);
                $(".cover").fadeOut(500);
            });
            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);

            $('body').on('click', '.supprimer', function() {
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

            fetch_incident_par_etat($('#searchDropdown').val());

            $('#searchDropdown').change(function() {
                fetch_incident_par_etat($('#searchDropdown').val());
            });

            // ajax search function
            function fetch_incident_par_etat(query = '') {
                $.ajax({
                    url:"{{ route('manager.list-incident.search') }}",
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


            let msg = '{{Session::get('delete_message')}}';
            let exist = '{{Session::has('delete_message')}}';
            if(exist){
                jconfirm({
                    title: 'Incident supprimé',
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