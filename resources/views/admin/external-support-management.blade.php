@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="container">

            <div class="ui middle aligned center aligned grid">
                <h2 class="ui icon header">
                    <i class="green users icon"></i>
                    <div class="content">
                        Liste des support externes
                    </div>
                </h2>
            </div>

            <div class="ui centered grid">

                @if($message = \Illuminate\Support\Facades\Session::get('support_message'))
                    <div class="row">
                        <div class="alert alert-success" id="message">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                @endif

                <form class="ui form" action="{{ route('support.add') }}" method="post">
                    @csrf
                    <div class="ui grid">
                        <div class="eight wide column">
                            <div class="field">
                                <label for="nom_support">Nom support</label>
                                <input type="text" name="nom_support" placeholder="Nom Support" value="{{ old("nom_support") }}" autofocus>
                            </div>
                            @if($errors->has('nom_support'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('nom_support') }}</strong>
                                </div>
                            @endif

                            <div class="field">
                                <label for="prenom_contact">Prénom contact</label>
                                <input type="text" name="prenom_contact" placeholder="Prénom contact" value="{{ old('prenom_contact') }}" autofocus>
                            </div>
                            @if($errors->has('prenom_contact'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('prenom_contact') }}</strong>
                                </div>
                            @endif

                            <div class="field">
                                <label for="nom_contact">Nom contact</label>
                                <input type="text" name="nom_contact" placeholder="Nom contact" value="{{ old('nom_contact') }}" autofocus>
                            </div>
                            @if($errors->has('nom_contact'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('nom_contact') }}</strong>
                                </div>
                            @endif

                        </div>
                        <div class="eight wide column">
                            <div class="field">
                                <label for="numero_telephone_support">Numéro mobile</label>
                                <input type="text" name="numero_telephone_support" placeholder="Numéro mobile" value="{{ old('numero_telephone_support') }}" autofocus>
                            </div>
                            @if($errors->has('numero_telephone_support'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('numero_telephone_support') }}</strong>
                                </div>
                            @endif

                            <div class="field">
                                <label for="mail_support">Mail</label>
                                <input type="email" name="mail_support" placeholder="Mail" value="{{ old('mail_support') }}" autofocus>
                            </div>
                            @if($errors->has('mail_support'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('mail_support') }}</strong>
                                </div>
                            @endif

                            <div class="field">
                                <label for="adresse_contact">Adresse contact</label>
                                <input type="text" name="adresse_contact" placeholder="Adresse" value="{{ old('adresse_contact') }}" autofocus>
                            </div>
                            @if($errors->has('adresse_contact'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('adresse_contact') }}</strong>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="ui buttons my-4">
                        <button class="ui green button" type="submit">
                            <i class="check icon"></i> Ajouter
                        </button>
                    </div>

                </form>
            </div>
            <br>
            <div class="ui centered grid py-3">
                <table class="ui collapsing red table" style="width: 90%">
                    <thead>
                    <tr>
                        <th>Support</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Telephone</th>
                        <th>Adresse</th>
                        <th>Mail</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supports = \Illuminate\Support\Facades\DB::table('support')->orderByDesc('created_at')->paginate(5) as $support)
                        <tr>
                        <td>{{ $support->nom_support }}</td>
                        <td>{{ $support->nom_contact }}</td>
                        <td>{{ $support->prenom_contact }}</td>
                        <td>{{ $support->numero_telephone_support }}</td>
                        <td>{{ $support->adresse_contact }}</td>
                        <td>{{ $support->mail_support }}</td>
                        <td data-label="Supprimer">

                            <form class="form-group delete" action="{{ route('admin.support.destroy', $support->id) }}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')

                                <button class="ui floated red button" type="submit">
                                    <i class="user times icon"></i> Supprimer
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            <div class="row justify-content-center py-3">
                {{ $supports->links() }}
            </div>

        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            // Hide the message div after 10 seconds.
            setTimeout(function () {
                $("#message").hide();
            }, 10000);

            $('.delete').on("click", function (event) {

                let $this = $(this);    // reference to the current scope

                jconfirm({
                    icon: 'glyphicon glyphicon-question-sign',
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer ce support?',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            btnClass: 'btn-red',
                            action: function () {
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
            if (exist) {
                jconfirm({
                    title: 'Support supprimé',
                    content: msg,
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        ok: {
                            text: 'Continuer',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function () {
                                return true;
                            }
                        }
                    }

                });
            }
        });
    </script>

@endsection