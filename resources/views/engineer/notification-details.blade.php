@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid">
            <h2 class="ui icon header">
                <i class="blue bell icon"></i>
                <div class="content">
                    Liste des notifications
                </div>
            </h2>
        </div>

        <div class="row my-md-3">
            <div class="col-md-10 offset-md-1">
                <table class="ui blue table">
                    <thead>
                    <tr>
                        <th>Objet</th>
                        <th>Date notification</th>
                        <th>Contenu</th>
                        <th>Urgence</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nots = \App\Notification::query()->orderByDesc('created_at')->paginate(5) as $not)
                        <tr>
                            <td>{{ $not->objet }}</td>
                            <td>{{ $not->date_notification }}</td>
                            <td>{{ $not->contenu }}</td>
                            <td>@if($not->urgence == 0)
                                    faible
                                @elseif($not->urgence == 1)
                                    moyenne
                                @elseif($not->urgence == 2)
                                    urgente
                                @elseif($not->urgence == 3)
                                    critique
                                @endif</td>
                            <td>
                                <div class="d-flex">
                                    <form class="delete" action="{{ route('engineer.notification.destroy', $not->id_notification) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="ui red button"><i class="trash icon"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row justify-content-center">
                    {{ $nots->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.delete').on("click", function (event) {

                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation',
                    content: 'Êtes-vous sûr de supprimer cette notification?',
                    type: 'red',
                    icon:'glyphicon glyphicon-question-sign',
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            btnClass: 'btn-red',
                            action : function () {
                                $this.off('submit').submit();
                            }
                        },
                        cancel: function () {
                        },
                    }
                });
                return false;
            });

            let msg = '{{Session::get('delete_message')}}';
            let exist = '{{Session::has('delete_message')}}';
            if(exist){
                jconfirm({
                    title: 'Notification supprimé',
                    content: msg,
                    type: 'green',
                    typeAnimated: true,
                    icon:'glyphicon glyphicon-ok-sign',
                    buttons: {
                        ok: {
                            text: 'Continuer',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function(){
                                return true;
                            }
                        }
                    }

                });
            }

        })
    </script>

@endsection