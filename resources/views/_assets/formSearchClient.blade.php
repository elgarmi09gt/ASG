<form action=" {{ route('clients.getby')}} " class="form-inline" method="POST">
  @csrf
  <input type="text" class="form-control col-md-8 sm-10 offset-1" name='search' 
  value="{{ !$search ? '' : $search }}" placeholder="Entrer le nom ou le Prénom d'un client">
  <button class="btn btn-primary">Trouver</button>
</form>