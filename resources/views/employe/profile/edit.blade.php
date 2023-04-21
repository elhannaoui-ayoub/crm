@extends('employe.profile.edit.create')
@section('content')
@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
    {{Session::get('msg')}}
  </div>
@endif
<form action="{{route('employe.profile.edit.store',['id'=>$societe->id])}}" method="POST">@csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input type="text" name="nom" value="{{$societe->nom}}" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">ICE</label>
    <input type="text" name="ice" value="{{$societe->ice}}"  class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Site Web</label>
    <input type="text" name="siteweb" value="{{$societe->siteweb}}"  class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
 <button class="btn btn-primary">Envoyer</button>
</div>
</form>
@endsection