@extends('layouts.app')

@section('content')

    <div class="ui visible inverted left vertical sidebar menu pt-md-3" id="sidebar">
        <h2 class="ui logo icon image text-center" style="color: white">
            <i class="map icon"></i>
            <b>Outil de supervision</b>
        </h2>

        <div class="row">
            <div class="col-12 text-center pb-2">
                <div class='font-weight-bold text-xl-center text-white'>Manager</div>
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
                Gestion des Incidents
            </div>
            <a href="{{ route('manager',  ['item'=>'list-incident']) }}" class="item">
                Liste des incidents
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

            $(window).on('unload', function () {
                saveScroll();
            });
        });
    </script>

@endsection