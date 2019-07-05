<table class="ui red table">
    <thead>
    <tr>
        <th>Constructeur</th>
        <th>Réference</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    @if(count($data) == 0)
        <tr>
            <td class="justify-content-center" colspan="3">Aucune donnée disponible</td>
        </tr>
    @endif
    @foreach($data as $row)
        <tr>
            <td>{{ $row->constructeur }}</td>
            <td>{{ $row->reference }}</td>
            <td data-label='Supprimer'>
                <form action='{{ route('admin.hardware.marque-hardware.destroy', $row->id_marque_hardware) }}' method='post'>
                    @csrf
                    <button class='supprimer_marque btn btn-danger' type='submit'>
                        <i class='glyphicon glyphicon-remove'></i>
                        <strong>Supprimer</strong>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row justify-content-center">
    {{ $data->links() }}
</div>

