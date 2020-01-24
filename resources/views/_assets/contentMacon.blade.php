<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" style='text-align:center'>Prénom</th>
      <th scope="col" style='text-align:center'>Nom</th>
      <th scope="col" style='text-align:center'>Telephone</th>
      <th scope="col" colspan="2" style='text-align:center'>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($macons as $macon)
    <tr>
      <th scope="row">{{ $macon->id }}</th>
      <td>{{ $macon->Prenom }}</td>
      <td>{{ $macon->Nom }}</td>
      <td>{{ $macon->Telephone }}</td>
      <td style='text-align:center'>
        <a href="{{ route('macons.analyses', $macon->id)}}" class="btn btn-info">Analyse</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>