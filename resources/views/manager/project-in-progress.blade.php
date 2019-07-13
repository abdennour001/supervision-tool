@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green calendar icon"></i>
                <div class="content">
                    Liste des projets en cours
                </div>
            </h2>
        </div>
        <div class="table">
            @include('manager.table-etape-include')
        </div>
    </div>

@endsection