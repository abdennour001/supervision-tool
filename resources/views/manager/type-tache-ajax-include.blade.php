<label style="font-weight: normal; font-size: medium;">Type de tâche</label>
<select name="type_tache" class="ui fluid dropdown form-control">
    @foreach($famille->typeTaches as $type)
        <option value="{{ $type->id_type_tache }}">{{ $type->libelle_type_tache }}</option>
    @endforeach
</select>