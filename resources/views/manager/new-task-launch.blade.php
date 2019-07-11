@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green sticky note icon"></i>
                <div class="content">
                    Lancer une nouvelle tâche
                </div>
            </h2>
        </div>

        <div class="ui centered grid">
            <form class="ui form" action="{{ route('manager.manage-task.add-tache-it') }}" method="post">
                @csrf
                <div class="field">
                    <label style="font-weight: normal; font-size: medium;">Famille de type de tâche</label>
                    <select id="searchDropdown" class="ui fluid dropdown form-control">
                        @foreach(\App\FamilleTypeTache::all() as $famille)
                            <option value="{{ $famille->id_famille_type_tache }}">{{ $famille->libelle_famille_type_tache }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field include">

                </div>
                <div class="grouped fields">
                    <label style="font-weight: normal; font-size: medium;">Appartient à un projet?</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input class="form-control" type="radio" name="projet" value="oui">
                            <label>Oui</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input class="form-control" type="radio" name="projet" value="non">
                            <label>Non</label>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label style="font-weight: normal; font-size: medium;">Ingénieur</label>
                    <select name="engineer" class="ui fluid dropdown form-control">
                        @foreach(\App\Ingenieur::all() as $ing)
                            <option value="{{ $ing->id_profil }}">{{ $ing->nom . ' ' . $ing->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="ui two column centered grid">
                    <div class="four column centered row">
                        <div class="ui buttons">
                            <button class="ui green button" type="submit">
                                <i class="check icon"></i> Lancer
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            fetch_type_tache_info($('#searchDropdown').val());

            $('#searchDropdown').change(function() {
                fetch_type_tache_info($('#searchDropdown').val());
            });

            // ajax search function
            function fetch_type_tache_info(query = '') {
                $.ajax({
                    url:"{{ route('manager.manage-task.search-type-tache') }}",
                    method: 'GET',
                    data: {query:query},
                    dataType: 'text',
                    success:function(data) {
                        $(".include").html(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                })
            }
        })
    </script>

@endsection