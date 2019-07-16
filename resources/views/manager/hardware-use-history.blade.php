@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">

        <div class="ui one column stackable center aligned grid">
            <div class="column twelve wide padd">
                <h2 class="ui icon header">
                    <i class="green history icon"></i>
                    <div class="content">
                        Liste historique hardware
                    </div>
                </h2>
            </div>
        </div>

        <div class="col-md-6 my-md-4">
            <div class="row">
                <div class="col-md-6 offset-2">
                    <label style="font-size: medium;">Rechecher par type hardware</label>
                </div>
                <div class="col-md-push-4">
                    <select id="searchDropdown" class="ui fluid dropdown">
                        @foreach($typesHardware = \App\TypeHardware::all()->sortByDesc('created_at')
                            as $typeHardware)
                            <option value="{{ $typeHardware->id_type_hardware }}">
                                {{ $typeHardware->libelle_type_hardware }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="table col-md-10 offset-md-1 mb-md-4">

        </div>
    </div>

    <script>
        $(document).ready(function () {
            fetch_hardware_use($('#searchDropdown').val());

            $('#searchDropdown').change(function() {
                fetch_hardware_use($('#searchDropdown').val());
            });

            // ajax search function
            function fetch_hardware_use(query = '') {
                $.ajax({
                    url:"{{ route('manager.hardware.use.search') }}",
                    method: 'GET',
                    data: {query:query},
                    dataType: 'text',
                    success:function(data) {
                        $(".table").html(data);
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