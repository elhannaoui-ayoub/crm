@extends('administrateur.layouts.app')

@section('content')
@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
    {{Session::get('msg')}}
  </div>
@endif
<form action="{{route('administrateur.societes.new.store')}}" method="POST">@csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">ICE</label>
    <input type="text" name="ice" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Site Web</label>
    <input type="text" name="siteweb" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
 <button class="btn btn-primary">Envoyer</button>
</div>
</form>
@endsection