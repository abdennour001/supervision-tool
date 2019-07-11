@extends('layouts.admin')

@section('content-admin')

    <div class="cover" style="background-color:black; width:100%; height:200%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="green puzzle piece icon"></i>
                <div class="content">
                    Associer hardware-software à un type de tâche
                </div>
            </h2>
        </div>
        <div class="form">
            <div class="ui middle aligned center aligned grid form my-md-4">
                <div class="inline field">
                    <label style="font-size: large; font-weight: normal;">Type tâche</label>
                    <select id="searchDropdown" class="ui fluid dropdown form-control" name="famille">
                        @foreach(\App\TypeTache::all() as $type)
                            <option value="{{ $type->id_type_tache }}">{{ $type->libelle_type_tache }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        @if($message = \Illuminate\Support\Facades\Session::get('add_message'))
            <div class="row justify-content-center" id="message">
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif

        @if($message = \Illuminate\Support\Facades\Session::get('delete_message'))
            <div class="row justify-content-center" id="message2">
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif

        <div class="include"></div>
    </div>

    <script>

        $(document).ready(function () {
            $('.supprimer').on('click', function() {
                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer cet élement?',
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


            fetch_type_tache_info($('#searchDropdown').val());

            $('#searchDropdown').change(function() {
                fetch_type_tache_info($('#searchDropdown').val());
            });

            // ajax search function
            function fetch_type_tache_info(query = '') {
                $.ajax({
                    url:"{{ route('admin.manage-task.search-type-tache') }}",
                    method: 'GET',
                    data: {query:query},
                    dataType: 'text',
                    success:function(data) {
                        $(".include").html(data);
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
                    $('.include').html(data);
                })
            }

            // Override the pagination
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                let url = $(this).attr('href');
                getPage(url, $('#searchDropdown').val());
                window.history.pushState("", "", "");
            });

            $('body').on('click', '.modify', function () {
                window.location.replace("new-task-type");
            });

            let dropdown = $('.dropdown');

            $('.include').on('show.bs.dropdown', dropdown, function () {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeIn(500);
                $(".cover").fadeTo(500, 0.5);
            });

            $('.include').on('hide.bs.dropdown', dropdown, function () {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeOut(500);
                $(".cover").fadeOut(500);
            });

            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);

            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message2").hide();
            },10000);

            $('body').on('click', '.supprimer', function () {
                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer?',
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


            let msg = '{{Session::get('warning_message')}}';
            let exist = '{{Session::has('warning_message')}}';
            if(exist){
                jconfirm({
                    title: 'Type existé déja',
                    content: msg,
                    type: 'red',
                    typeAnimated: true,
                    icon:'glyphicon glyphicon-exclamation-sign',
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
            }

        })

    </script>

@endsection