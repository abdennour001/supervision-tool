@extends('layouts.app')

@section('content')

    <div class="ui visible inverted left vertical sidebar menu pt-md-2">
        <h2 class="ui logo icon image text-center" style="color: white">
            <i class="map icon"></i>
            <b>Outil de supervision</b>
        </h2>

        <div class="row">
            <div class="col-12 text-center pb-2">
                <div class='font-weight-bold text-xl-center text-white'>Ingénieur</div>
            </div>
            <div class="col-12 input-position text-center pb-2">
                <img src="{{ \Illuminate\Support\Facades\Session::get('profil')->url_photo }}" class="rounded-circle w-20" style="margin: 0 auto; display: block; max-width: 30%; height: auto;">
            </div>
            <div class="col-12">
                <div class='font-weight-bold text-xl-center text-white-50'>{{ \Illuminate\Support\Facades\Session::get('profil')->nom . " " . \Illuminate\Support\Facades\Session::get('profil')->prenom }}</div>
                <div class='text-xl-center text-white-50'><strong><</strong>{{ \Illuminate\Support\Facades\Session::get('profil')->login_compte }}<strong>></strong></div>
            </div>
        </div>

        <div class="item">
            <div class="header">
                Gestion des tâches
            </div>
            <a href="{{ url('/engineer',  ['item'=>'new-task-launch']) }}" class="item">
                Nouvelle tâche
            </a>
            <a href="{{ url('/engineer',  ['item'=>'task-details']) }}" class="item">
                Détails des tâches
            </a>
            <a href="{{ url('/engineer',  ['item'=>'task-in-progress']) }}" class="item">
                Tâches en cours
            </a>
        </div>
        <div class="item">
            <div class="header">
                Projets
            </div>
            <a href="{{ url('/engineer',  ['item'=>'new-project']) }}" class="item">
                Nouveau projet
            </a>
            <a href="{{ url('/engineer',  ['item'=>'project-in-progress']) }}" class="item">
                Projets en cours
            </a>
        </div>
        <div class="item">
            <div class="header">
                Rapport
            </div>
            <a href="{{ url('/engineer',  ['item'=>'hardware-use-history']) }}" class="item">
                Historique hardware
            </a>
            <a href="{{ url('/engineer',  ['item'=>'software-use-history']) }}" class="item">
                Historique software
            </a>
        </div>
        <div class="item">
            <div class="header">
                <a href="{{ url('/engineer',  ['item'=>'notification-details']) }}" class="item">
                    Notifications
                </a>
            </div>
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

        @yield('content-engineer')

    </div>

@endsection