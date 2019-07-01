@extends('layouts.app')

@section('content')

    <div class="ui visible inverted left vertical sidebar menu pt-md-3">
        <h2 class="ui logo icon image text-center" style="color: white">
            <i class="map icon"></i>
            <b>Outil de supervision</b>
        </h2>

        <div class='font-weight-bold text-xl-center text-white'>Manager</div>
        <div class='font-weight-bold text-xl-center text-white-50'>{{ \Illuminate\Support\Facades\Session::get('profil')->nom . " " . \Illuminate\Support\Facades\Session::get('profil')->prenom }}</div>
        <div class='text-xl-center text-white-50'><strong><</strong>{{ \Illuminate\Support\Facades\Session::get('profil')->login_compte }}<strong>></strong></div>


        <div class="item">
            <div class="header">
                Gestion des tâches
            </div>
            <a href="{{ route('manager',  ['item'=>'new-task-launch']) }}" class="item">
                Affecter tâche
            </a>
            <a href="{{ route('manager',  ['item'=>'list-incident']) }}" class="item">
                Liste des incidents
            </a>
            <a href="{{ route('manager',  ['item'=>'signaler-incident']) }}" class="item">
                Signaler incident
            </a>
        </div>
        <div class="item">
            <div class="header">
                Projets
            </div>
            <a href="{{ url('/manager',  ['item'=>'new-project']) }}" class="item">
                Nouveau projet
            </a>
            <a href="{{ url('/manager',  ['item'=>'project-in-progress']) }}" class="item">
                Projets en cours
            </a>
        </div>
        <div class="item">
            <div class="header">
                <a href="{{ url('/manager',  ['item'=>'external-support-management']) }}" class="item">
                    Support externe
                </a>
            </div>
        </div>
        <div class="item">
            <div class="header">
                Inventaire
            </div>
            <a href="{{ url('/manager',  ['item'=>'manage-hardware']) }}" class="item">
                Liste des hardwares
            </a>
            <a href="{{ url('/manager',  ['item'=>'manage-software']) }}" class="item">
                Liste des softwares
            </a>
            <a href="{{ url('/manager',  ['item'=>'list-boutique']) }}" class="item">
                Liste des boutiques
            </a>
        </div>
        <div class="item">
            <div class="header">
                Rapport
            </div>
            <a href="{{ url('/manager',  ['item'=>'hardware-use-history']) }}" class="item">
                Historique hardware
            </a>
            <a href="{{ url('/manager',  ['item'=>'software-use-history']) }}" class="item">
                Historique software
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

        @yield('content-manager')

    </div>

@endsection