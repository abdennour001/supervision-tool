@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green calendar plus icon"></i>
                <div class="content">
                    Nouveau Projet
                </div>
            </h2>
        </div>

        <div class="row justify-content-center my-md-3">
            @if($message = \Illuminate\Support\Facades\Session::get('add_message'))
                <div class="alert alert-success" id="message">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>

        <form action="{{ route('manager.project.store') }}" method="post">
            @csrf
            <div class="ui middle aligned center aligned grid form mt-md-4">
                <div class="inline field">
                    <label for="projectName" style="font-weight: normal; font-size: medium;">Nom projet</label>
                    <input id="projectName" type="text" name="nomProjet" placeholder="Nom Projet" class="form-control" required>
                </div>
                <div class="inline field">
                    <label for="projectName" style="font-weight: normal; font-size: medium;">Date lancement</label>
                    <input id="projectName" type="date" name="dateDebut" placeholder="Nom Projet" class="form-control" required>
                </div>
                <div class="inline field">
                    <label for="projectName" style="font-weight: normal; font-size: medium;">Date fin</label>
                    <input id="projectName" type="date" name="dateFin" placeholder="Nom Projet" class="form-control" required>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="field">
                        <button class="ui green button" type="submit">
                            <i class="check icon"></i> Ajouter
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        $(document).ready(function () {
            // Hide the message div after 10 seconds.
            setTimeout(function(){
                $("#message").hide();
            },10000);
        });
    </script>

@endsection