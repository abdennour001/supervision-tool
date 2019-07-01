@extends('layouts.admin')

@section('content-admin')
    <div class="pusher">

        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green address book icon"></i>
                <div class="content">
                    Liste profil
                </div>
            </h2>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <a class="ui green button" href="{{ route('admin', ['item' => 'new-profile']) }}">
                        <i class="check icon"></i> Ajouter profil
                    </a>
                </div>
            </div>
        </div>

        @if($message = \Illuminate\Support\Facades\Session::get('delete_message'))
            <div class="row justify-content-center pt-sm-3" id="message">
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif

        @if($message = \Illuminate\Support\Facades\Session::get('update_message'))
            <div class="row justify-content-center pt-sm-3" id="message">
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif

        <div class="ui unstackable items pb-5 pt-sm-3">

            @foreach($profiles = \Illuminate\Support\Facades\DB::table('profil')->orderByDesc('created_at')->paginate(5) as $profil)
                <div class="item">
                    <div class="image">
                        <img src="{{ $profil->url_photo }}" class="w-100 justify-content-center">
                    </div>
                    <div class="content">
                        <div class="header">{{ $profil->nom . " " . $profil->prenom }}</div>
                        <div class="meta">
                            <span>Tel : {{ $profil->numero_telephone }}</span>
                        </div>
                        <div class="meta">
                            <span>Mail : {{ $profil->mail }}</span>
                        </div>
                        <div class="meta">
                            <span>Login : {{ $profil->login_compte }}</span>
                        </div>
                        <div class="container pt-sm-2">
                            <div class="row flex-row justify-content-start">
                                <div class="col-m-6">
                                    @if(\Illuminate\Support\Facades\Session::get('profil')->id_profil != $profil->id_profil)
                                        <form class="form-group delete" action="{{ route('admin.profile.destroy', $profil->id_profil) }}" method="post">
                                            {{ csrf_field() }}
                                            @method('DELETE')

                                            <button class="ui right floated red button" type="submit">
                                                <i class="user times icon"></i> Supprimer profil
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="col-m-6">
                                    <button id="{{ $profil->id_profil }}" class="ui right floated primary button modify">
                                        <i class="edit icon"></i> Modifier profil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            {{ $profiles->links() }}
        </div>

    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);

            $('.delete').on("click", function (event) {

                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer ce profil?',
                    buttons: {
                        confirm: {
                            btnClass: 'btn-blue',
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
                    title: 'Profil supprimé',
                    content: msg,

                    buttons: {
                        ok: {
                            text: 'Continuer',
                            btnClass: 'btn-blue',
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
                    title: 'Profil Modifié',
                    content: msg_update,

                    buttons: {
                        ok: {
                            text: 'Continuer',
                            btnClass: 'btn-blue',
                            keys: ['enter', 'shift'],
                            action: function(){
                                return true;
                            }
                        }
                    }

                });
            }

            $('.modify').on('click', function () {

                let id_profil = jQuery(this).attr("id");

                window.location.replace("list-profile/" +id_profil + "/edit-profile");
            })
        });

    </script>
@endsection