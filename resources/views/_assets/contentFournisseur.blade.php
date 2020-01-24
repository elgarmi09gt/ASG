{{-- <div>
  @include('_assets.formSearchFourniss')
</div> --}}

{{-- @dd($GetNombreParcelle(1)) --}}
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" style="text-align:center">Fournisseurs</th>
      <th scope="col" style="text-align:center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($fournisseurs as $fournisseur)
    <tr>
      <th scope="row">{{ $fournisseur->id }}</th>
      <td style="text-align:center">{{ $fournisseur->fournisseurs }}</td>
      <td colspan="2" style='text-align:center'><a href=" {{ route('fournisseurs.getfactures',$fournisseur->id)}} " class="btn btn-info">Analyse</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $fournisseurs->links() }}