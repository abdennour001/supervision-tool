@extends('layouts.app')

@section('content')
<div class="frame">

    <div class="ui middle aligned center aligned grid mt-md-3">
        <div class="ui segment">
            <h3 class="ui center aligned header">
                Bienvenue dans votre application de supervision de service IT
            </h3>
        </div>
    </div>

    <div class="ui centered grid" style="padding: 5%;">
        <div class="container row justify-content-center">
            @include('messages.errors')
        </div>
        <form class="ui form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <label>Login</label>
                <input type="text" name="login_compte" placeholder="Login" value="{{ old('login_compte') }}">
            </div>
            <div class="field">
                <label>Mot de passe</label>
                <input type="password" name="password_compte" placeholder="Mot de passe">
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" tabindex="0">
                    <label>Se souvenire de moi</label>
                </div>
            </div>
            <button class="ui green button" type="submit">Se Connecter</button>
        </form>
    </div>

</div>
@endsection
