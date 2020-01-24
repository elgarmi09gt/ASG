<div>
@include('_assets.formSearchClient')
</div>
<br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" style='text-align:center'>Prénom</th>
        <th scope="col" style='text-align:center'>Nom</th>
        <th scope="col" style='text-align:center'>Niveau Edifice Déclaré</th>
        <th scope="col" style='text-align:center;'>Niveau Edifice Réel à la date du 04/12/2013</th>
        <th scope="col" style='text-align:center;'>Voir les Détails</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $client)
        @foreach ($GetParcelles($client->id) as $getniveau)
          <tr>
            <th scope="row">{{ $client->id }}</th>
            <td style='text-align:center'>{{ $client->Prenom }}</td>
            <td style='text-align:center'>{{ $client->Nom }}</td>
            <td style='text-align:center'>{{ $niveaud = $getniveau->Niveau_declare }}</td>
            <td style='text-align:center'>{{ $niveaur = $getniveau->Niveau_reel}}</td>
            @if (!empty($niveaur) && ($niveaur != 'BATIMENT') && ($niveaur != 'CLOTURE') && ($niveaur != 'FONDATION' && $niveaur != 'ELEVATION'))
            <td style='text-align:center'>
              <a href=" {{ route('clients.analyses', $client->id)}} " class="btn btn-primary">Analyse</a>
            </td>else
            @else
            <td style='text-align:center'>
              <a href=" {{ route('clients.analyses', $client->id)}} " class="btn btn-danger">Analyse</a>
            </td>
            @endif
          </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>
  {{ $clients->links()}}