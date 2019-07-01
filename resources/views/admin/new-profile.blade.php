@extends('layouts.admin')

@section('content-admin')

    <div class="pusher">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green user plus icon"></i>
                <div class="content">
                    Nouveau profil
                </div>
            </h2>
        </div>

        <div class="ui centered grid">

            @if($message = \Illuminate\Support\Facades\Session::get('register_message'))
                <div class="row">
                    <div class="alert alert-success" id="message">
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
            @endif

            <form class="ui form" action="{{ route('add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="ui two column center aligned grid">
                    <div class="eight wide column">
                        <div class="field">
                            <label for="nom" class="col-form-label">Nom</label>

                            <input class="form-control"
                                   type="text"
                                   name="nom"
                                   placeholder="Nom"
                                   value="{{ old('nom') }}"
                                    autofocus>

                            @if($errors->has('nom'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </div>
                            @endif

                        </div>
                        <div class="field">
                            <label for="prenom" class="col-form-label">Prénom</label>
                            <input type="text"
                                   class="form-control"
                                   name="prenom"
                                   placeholder="Prénom"
                                   value="{{ old('prenom') }}"
                                   autofocus>

                            @if($errors->has('prenom'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </div>
                            @endif

                        </div>
                        <div class="field">
                            <label for="mail" class="col-form-label">Mail</label>
                            <input type="email"
                                   name="mail"
                                   placeholder="Mail"
                                   class="form-control"
                                   value="{{ old('mail') }}"
                                   autofocus>

                            @if($errors->has('mail'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('mail') }}</strong>
                                </div>
                            @endif

                        </div>
                        <div class="field">
                            <label for="url_photo" class="col-form-label">Image</label>
                            <input type="file"
                                   name="url_photo"
                                   value="{{ old('url_photo') }}"
                                   autofocus>

                            @if($errors->has('url_photo'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('url_photo') }}</strong>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="eight wide column">
                        <div class="field">
                            <label for="password_compte" class="col-form-label">Mot de passe</label>
                            <input type="password"
                                   name="password_compte"
                                   placeholder="Mot de passe"
                                   class="form-control"
                                   autofocus>

                            @if($errors->has('password_compte'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('password_compte') }}</strong>
                                </div>
                            @endif

                        </div>
                        <div class="field">
                            <label for="role" class="col-form-label">Rôle</label>
                            <select class="ui fluid dropdown form-control">
                                <option value="ing">Ingénieur</option>
                                <option value="man">Manager</option>
                                <option value="admin">Administrateur</option>
                            </select>

                            @if($errors->has('prenom'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <br>
                                </div>
                            @endif

                        </div>
                        <div class="field">
                            <label for="login_compte" class="col-form-label">Login</label>
                            <input type="text"
                                   name="login_compte"
                                   class="form-control"
                                   value="{{ old('login_compte') }}"
                                   placeholder="Login"
                                   autofocus>

                            @if($errors->has('login_compte'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('login_compte') }}</strong>
                                </div>
                            @endif

                        </div>

                        <div class="field">
                            <label for="numero_telephone" class="col-form-label">Numero telephone</label>
                            <input type="text"
                                   name="numero_telephone"
                                   class="form-control"
                                   value="{{ old('numero_telephone') }}"
                                   placeholder="numero_telephone"
                                   autofocus>

                            @if($errors->has('numero_telephone'))
                                <div class=" text-md-left text-danger" role="alert">
                                    <strong>{{ $errors->first('numero_telephone') }}</strong>
                                </div>
                            @endif

                        </div>

                    </div>

                    <button class="ui green button form-check" name="submit" type="submit">
                        <i class="plus icon"></i>
                        Ajouter
                    </button>

                </div>
            </form>

        </div>
    </div>

    <script type="text/javascript">

        // Hide the message div after 10 seconds.
        setTimeout(function(){
            $("#message").hide();
        },10000);

    </script>

@endsection