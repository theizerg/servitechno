@extends('layouts.admin')
@section('title', 'Home')
@section('content')
  @if (Auth::user()->hasRole('Super Administrador'))


  	


  @elseif($organismo->photo == null || $organismo->direccion == null || $organismo->razon_social == null )

		@include('layouts.partials.modal.organismo.nuevo')

  @endif
@endsection
@push('scripts')
<script>
	$( document ).ready(function() {
    $('#myModal').modal('toggle')
});
</script>
@endpush

