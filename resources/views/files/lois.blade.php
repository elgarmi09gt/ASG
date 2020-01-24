{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'EDR')

@section('content')
<script src="{{ asset('js/jquery.3.2.1.min.js') }}"></script>
<!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header text-center">
        <h3 class="text-center" style="background: #2196f3; color: #fff; padding: 20px;">LES LOIS LIES</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <th>id</th>
            <th>LOIS </th>
            <th>Action</th>
          </thead>
          <tbody>
            @if(count($lois))
            @foreach($lois as $loi)
            <tr>
              <td> {{ $loi->id}}</td>
              <td>{{ $loi->fichier }}</td>
              <td>
                <!-- Show modal to display pdf -->
                <a href="#" class="show-modal btn btn-info btn-md"
                  style="box-shadow: 0 0 15px #95A5A6; background: #1DC7EA; color: #fff; text-align:center"
                  data-fichier="{{$loi->fichier}}">
                  <i class="fa fa-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <th colspan="4" class="text-center">Aucun Lois Enregistr&eacute; !</th>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>

    <div id="showmodalF" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="width: 170%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
              style="color: #fff; font-size: 30px;">&times;</button>
          </div>
          <div class="modal-body" style=" height: 80vh;">

          </div>
        </div>
      </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{ asset('js/pdfobject.min.js') }}"> </script>

<script>
  // Show function Fournisseur
    $(document).on('click', '.show-modal', function() {
        $('#showmodalF').modal('show');

        var fichier = '{{ asset('files/lois/')}} ' + '/' + $(this).data('fichier') + '.pdf';
        PDFObject.embed(fichier, '.modal-body');
        $('.modal-header').css('background', '#1DC7EA');
    }); 
</script>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!'); 
</script>
@stop