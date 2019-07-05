@extends('layouts.admin')

@section('content-admin')

    <div class="row">

        <div class="col-md-4">

            <form method="post" action="{{ route('admin.profile.update', $profile->id_profil) }}" class="form-group">
                @csrf
                @method('PATCH')
                <div class="form-group p-sm-4">
                    <label for="nom">Nom</label>
                    <input type="text" placeholder="Nom" class="my-2 form-control" name="nom" value="{{ old('nom') ?? $profile->nom }}" autofocus/>
                    @if($errors->has('nom'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </div>
                    @endif
                    <label for="prenom">Prénom</label>
                    <input type="text" placeholder="Prénom" class="my-2 form-control" name="prenom" value="{{ old('prenom') ?? $profile->prenom }}" autofocus/>
                    @if($errors->has('prenom'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('prenom') }}</strong>
                        </div>
                    @endif
                    <label>Mail</label>
                    <input type="text" placeholder="Mail" class="my-2 form-control" name="mail" value="{{ old('mail') ??  $profile->mail }}" autofocus/>
                    @if($errors->has('mail'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('mail') }}</strong>
                        </div>
                    @endif
                    <label>Login</label>
                    <input type="text" placeholder="Login" class="my-2 form-control" name="login_compte" value="{{ old('login_compte') ?? $profile->login_compte }}" autofocus/>
                    @if($errors->has('login_compte'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('login_compte') }}</strong>
                        </div>
                    @endif
                    <label>Numero telephone</label>
                    <input type="text" placeholder="Numero telephone" class="my-2 form-control" name="numero_telephone" value="{{ old('numero_telephone') ?? $profile->numero_telephone }}" autofocus/>
                    @if($errors->has('numero_telephone'))
                        <div class=" text-md-left text-danger" role="alert">
                            <strong>{{ $errors->first('numero_telephone') }}</strong>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary form-check mt-md-3">
                        Modifier
                    </button>

                    <a id="annuler" href="{{ url()->previous() }}" class="btn btn-danger form-check mt-md-3">
                        Annuler
                    </a>
                </div>
            </form>
        </div>

    </div>



@endsection('content-admin')
