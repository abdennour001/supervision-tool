@extends('layouts.engineer')

@section('content-engineer')

    <div class="pusher padd">
        <div class="ui middle alignedcenter aligned container">
            <h2 class="ui icon header">
                <i class="blue sticky note icon"></i>
                <div class="content">
                    Lancer une nouvelle tâche
                </div>
            </h2>
        </div>

        <div class="ui centered grid padd">
            <form class="ui form">
                <div class="field">
                    <label>Famille de type de tâche</label>
                    <select class="ui fluid dropdown">
                        <option value="tachesSyslog">Tâches de Syslog</option>
                    </select>
                </div>
                <div class="field">
                    <label>Type de tâche</label>
                    <select class="ui fluid dropdown">
                        <option value="configSyslog">Configuration Syslog</option>
                    </select>
                </div>
                <div class="grouped fields">
                    <label>Appartient à un projet?</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="projet" value="oui">
                            <label>Oui</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="projet" value="non">
                            <label>Non</label>
                        </div>
                    </div>
                </div>
                <div class="ui two column centered grid">
                    <div class="four column centered row">
                        <div class="ui buttons">
                            <button class="ui green button">
                                <i class="check icon"></i> Lancer
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection