<table class="ui green table">
    <thead>
    <tr>
        <th>Tache #</th>
        <th>Date affectation</th>
        <th>Date début</th>
        <th>Date fin</th>
        <th>Duree (heur)</th>
        <th>Etat</th>
        <th>Ingénieur</th>
        <th>Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach($taches as $tache)
        <tr>
            <td data-label="number">{{ $tache->id_tache }}</td>
            <td data-label="project">{{ $tache->date_affectation_tache }}</td>
            <td data-label="date debut">{{ $tache->date_debut_tache }}</td>
            <td data-label="date fin">{{ $tache->date_fin_tache }}</td>
            <td data-label="date fin">{{ $tache->duree}}</td>
            <td data-label="date fin">@if($tache->etat == 0)
                    active
                @elseif($tache->etat  == 1)
                    suspendue
                @elseif($tache->etat  == 2)
                    finie
                @elseif($tache->etat  == 3)
                    escaladée
                @endif
            </td>
            <td data-label="date fin">{{ $tache->ingenieur->nom . ' ' . $tache->ingenieur->prenom }}</td>
            <td data-label="date fin">{{ $tache->typeTache->libelle_type_tache }}</td>
        </tr>
    @endforeach
    </tbody>
</table>