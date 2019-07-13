@extends('layouts.app')

@section('content')

    <div id="sidebar" class="ui visible inverted left vertical sidebar menu pt-md-2">
        <h2 class="ui logo icon image text-center" style="color: white">
            <i class="map icon"></i>
            <b>Outil de supervision</b>
        </h2>
        <div class="row">
            <div class="col-12 text-center pb-2">
                <div class='font-weight-bold text-xl-center text-white'>Admin</div>
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
            <a href="{{ url('/admin',  ['item'=>'new-task-type']) }}" class="item">
                Ajouter type tâche
            </a>
            <a href="{{ url('/admin',  ['item'=>'new-task']) }}" class="item">
                Ajouter famille type tâche
            </a>
            <a href="{{ url('/admin',  ['item'=>'task-hard-soft-association']) }}" class="item">
                Associer hardware-software à un type de tâche
            </a>
        </div>
        <div class="item">
            <div class="header">
                <a id="logout" class="item" href="{{ route('logout') }}">
                    Déconnexion
                </a>
            </div>
        </div>
    </div>

    <div class="container pt-lg-5" style="margin-left:250px">

        @yield('content-admin')

    </div>

    <script>
        $(document).ready(function() {

            loadScroll();

            function loadScroll() {
                let cookies = document.cookie.split(';');
                for (var cookie in cookies) {
                    if (cookies[0].includes("offsetY")) {
                        break;
                    }
                }
                let offsetY = cookies[cookie].split('=')[1];
                $("#sidebar").scrollTop(offsetY);
            }

            function saveScroll() {
                document.cookie = "offsetY=" + $("#sidebar").scrollTop().toString() + ";path=/" ;
            }

            let aig=false;

            $(window).on('unload', function () {
                if(!aig) {
                    saveScroll();
                }
            });

            $('#logout').on('click', function () {
                aig=true;
                document.cookie = "offsetY=" + "0" + ";path=/" ;
            })
        });
    </script>

@endsection