@extends('layouts.admin')

@section('content-admin')

    <div class="cover" style="background-color:black; width:100%; height:100%; display:none; position:absolute; top:0; left:0; z-index: 1000;"></div>

    <div class="pusher">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="red hdd icon"></i>
                <div class="content">
                    Liste hardware
                </div>
            </h2>
        </div>
        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">

                    <div class="dropdown px-2">
                        <button class="btn btn-lg btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="pencil square icon"></i> Nouvelle référence hardware
                        </button>
                        <div class="dropdown-menu">
                            <form class="px-4 py-3">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1" style="font-size: medium;">Constructeur</label>
                                    <input type="text" name="constructeur" class="form-control" id="exampleDropdownFormEmail1" placeholder="Constructeur">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1" style="font-size: medium;">Réference</label>
                                    <input type="text" name="reference" class="form-control" id="exampleDropdownFormPassword1" placeholder="Réference">
                                </div>
                                <div class="form-group">
                                    <label for="select" style="font-size: medium;">Type hardware</label>
                                    <select id="select" name="type_hardware" class="ui fluid dropdown">
                                        <option value="routeur">Routeur</option>
                                        <option value="switch">Switch</option>
                                        <option value="hub">Hub</option>
                                    </select>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                    </div>
                    </div>
                    <div class="dropdown px-2">
                            <button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="pencil square icon"></i> Nouveau type hardware
                            </button>
                            <div class="dropdown-menu">
                                <form class="px-4 py-3" method="post" action="{{ route("admin.hardware.type-hardware.add") }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleDropdownFormEmail1" style="font-size: medium;">Libelle type hardware</label>
                                        <input type="text"  name="libelle_type_hardware" class="form-control" placeholder="Libelle type hardware">
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <div class="dropdown px-2">
                            <button class="btn btn-lg btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Supprimer type hardware
                                </button>
                            <div class="dropdown-menu">
                                    <form class="px-4 py-3">
                                        <div class="form-group">
                                            <label for="select" style="font-size: medium;">Type hardware</label>
                                            <select id="select" class="ui fluid dropdown">
                                                <option value="routeur">Routeur</option>
                                                <option value="switch">Switch</option>
                                                <option value="hub">Hub</option>
                                            </select>
                                        </div>
                                        <div class="row justify-content-center">
                                            <button type="submit" class="btn btn-primary supprimer">Supprimer</button>
                                        </div>
                                    </form>
                                </div>
                        </div>

                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 my-md-3">
                        <div class="row">
                            <div class="col-md-2" style="font-size: large; margin-top: 5px;">
                                <strong>List des références</strong>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label style="font-size: medium;">Rechecher par type hardware</label>
                                    </div>
                                    <div class="col-md-push-4">
                                        <select class="ui fluid dropdown">
                                            <option value="routeur">Routeur</option>
                                            <option value="switch">Switch</option>
                                            <option value="hub">Hub</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="ui red table">
                            <thead>
                            <tr>
                                <th>Constructeur</th>
                                <th>Réference</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-label="Constructeur">Cisco</td>
                                <td data-label="Reference">c1900</td>
                                <td data-label="Supprimer">
                                    <button class="ui red button">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Constructeur">Cisco</td>
                                <td data-label="Reference">3700</td>
                                <td data-label="Supprimer">
                                    <button class="ui red button">
                                        Supprimer
                                    </button>
                                </td>        </tr>
                            <tr>
                                <td data-label="Constructeur">Cisco</td>
                                <td data-label="Reference">C2600</td>
                                <td data-label="Supprimer">
                                    <button class="ui red button">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        $(document).ready(function() {

            let dropdown = $('.dropdown');

            dropdown.on('show.bs.dropdown', function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeIn(500);
                $(".cover").fadeTo(500, 0.5);
            });

            dropdown.on('hide.bs.dropdown', function() {
                let $this = $(this);    // reference to the current scope
                $this.children('div.dropdown-menu').fadeOut(500);
                $(".cover").fadeOut(500);
            });

            $('.supprimer').on('click', function() {
                let $this = $(this);    // reference to the current scope

                jconfirm({
                    title: 'Confirmation!',
                    content: 'Êtes-vous sûr de supprimer ce type de hardware?',
                    type: 'red',
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

        });

    </script>

@endsection