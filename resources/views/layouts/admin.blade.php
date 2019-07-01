@extends('layouts.app')

@section('content')

    <div class="ui visible inverted left vertical sidebar menu pt-md-2">
        <h2 class="ui logo icon image text-center" style="color: white">
            <i class="map icon"></i>
            <b>Outil de supervision</b>
        </h2>
        <div class='font-weight-bold text-xl-center text-white'>Admin</div>
        <div class='font-weight-bold text-xl-center text-white-50'>{{ \Illuminate\Support\Facades\Session::get('profil')->nom . " " . \Illuminate\Support\Facades\Session::get('profil')->prenom }}</div>
        <div class='text-xl-center text-white-50'><strong><</strong>{{ \Illuminate\Support\Facades\Session::get('profil')->login_compte }}<strong>></strong></div>
        <div class="item">
            <div class="header">
                Gestion des profils
            </div>
            <a href="{{ url('/admin',  ['item'=>'new-profile']) }}" class="item">
                Ajouter profil
            </a>
            <a href="{{ url('/admin',  ['item'=>'list-profile']) }}" class="item">
                Liste des profils
            </a>
        </div>
        <div class="item">
            <div class="header">
                Gestion ressources
            </div>
            <a href="{{ url('/admin',  ['item'=>'manage-hardware']) }}" class="item">
                Gestion hardware
            </a>
            <a href="{{ url('/admin',  ['item'=>'manage-software']) }}" class="item">
                Gestion software
            </a>
            <a href="{{ url('/admin',  ['item'=>'manage-software-type']) }}" class="item">
                Gestion des types de softwares
            </a>
        </div>
        <div class="item">
            <div class="header">
                <a href="{{ url('/admin',  ['item'=>'external-support-management']) }}" class="item">
                    Support externe
                </a>
            </div>
        </div>
        <div class="item">
            <div class="header">
                Gestion des tâches
            </div>
            <a href="{{ url('/admin',  ['item'=>'new-task-launch']) }}" class="item">
                Nouvelle tâche
            </a>
        </div>
        <div class="item">
            <div class="header">
                <a class="item" href="{{ route('logout') }}">
                    Déconnexion
                </a>
            </div>
        </div>
    </div>

    <div class="container pt-lg-5" style="margin-left:250px">

        @yield('content-admin')

    </div>

@endsection