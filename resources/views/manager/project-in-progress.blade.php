@extends('layouts.manager')

@section('content-manager')

    <div class="cover" style="background-color:black; width:200%; height:200%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green calendar icon"></i>
                <div class="content">
                    Liste des projets en cours
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

        <div class="table">

        </div>
    </div>

    <script>
        $(document).ready(function() {
            fetchProjects();

            // ajax search function
            function fetchProjects() {
                $.ajax({
                    url:"{{ route('manager.project.search') }}",
                    method: 'GET',
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

            function fetchEtapes(query = '') {
                $.ajax({
                    url:"{{ route('manager.project.etape.search') }}",
                    method: 'GET',
                    data: {project : query},
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

            function fetchTaches(query = '') {
                $.ajax({
                    url:"{{ route('manager.project.tache.search') }}",
                    method: 'GET',
                    data: {etape : query},
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

            let body = $('body');

            body.on('click', '.afficher', function () {
                let project = $(this).attr('project');
                // Ajax call to get steps of the project
                fetchEtapes(project);
            });

            body.on('click', '.return-etape', function () {
                fetchProjects();
            });
            body.on('click', '.return-tache', function () {
                let projet = $(this).attr('projet');

                fetchEtapes(projet);
            });

            body.on('click', '.afficher-etape', function () {
                let etape = $(this).attr('etape');
                // Ajax call to get steps of the project
                fetchTaches(etape);
            });

            let dropdown = $('.dropdown');

            body.on('show.bs.dropdown', dropdown, function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeIn(500);
                $(".cover").fadeTo(500, 0.5);
            });

            body.on('hide.bs.dropdown', dropdown, function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeOut(500);
                $(".cover").fadeOut(500);
            });

            let msg = '{{Session::get('ajax_message')}}';
            let exist = '{{Session::has('ajax_message')}}';
            if(exist){
                fetchEtapes(msg);
            }

            let msg2 = '{{Session::get('ajax_message2')}}';
            let exist2 = '{{Session::has('ajax_message2')}}';
            if(exist2){
                fetchTaches(msg2);
            }


            let msgd = '{{Session::get('delete_message')}}';
            let existd = '{{Session::has('delete_message')}}';
            if(existd){
                jconfirm({
                    title: 'Objet supprimé',
                    content: msgd,
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

            body.on("click", '.delete', function (event) {

                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation',
                    content: 'Êtes-vous sûr de supprimer cet objet?',
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

            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);
        });
    </script>

@endsection