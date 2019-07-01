@extends('layouts.manager')

@section('content-manager')

    <div class="pusher padd">
        <div class="ui middle aligned center aligned grid padd">
            <h2 class="ui icon header">
                <i class="green exclamation triangle icon"></i>
                <div class="content">
                    Signaler incident
                </div>
            </h2>
        </div>
        <div class="ui middle aligned center aligned grid form">
            <div class="field">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description">
            </div>
            <div class="field">
                <label>Séverité</label>
                <select class="ui fluid dropdown">
                    <option value="Critique">Critique</option>
                </select>
            </div>
        </div>

        <div class="ui two column centered grid">
            <div class="four column centered row">
                <div class="ui buttons">
                    <button class="ui red button">Signaler</button>
                </div>
            </div>
        </div>
    </div>

@endsection