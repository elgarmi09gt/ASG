<form action=" {{ route('fournisseurs.getby')}} " class="form-inline" method="POST">
  @csrf
  <input type="text" class="form-control col-md-10 sm-10" 
  name='search' value="{{ !$search ? '' : $search }}" placeholder="Taper le nom du fournisseur que vous voulez analyser ses factures !!!">
  <button class="form-control btn btn-primary">Trouver</button>
</form>