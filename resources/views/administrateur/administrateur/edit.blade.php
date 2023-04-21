@extends('administrateur.layouts.app')
@section('content')
@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
    {{Session::get('msg')}}
</div>
@endif
<form action="{{route('administrateur.administrateurs.edit.store',['id'=>$administrateur->id])}}" method="POST">
@csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input type="text" name="nom" value="{{$administrateur->nom}}" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Prenom</label>
    <input type="text" name="prenom" value="{{$administrateur->prenom}}" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email</label>
    <input type="text" name="email" value="{{$administrateur->email}}"  class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="text" name="password" value=""  class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
 <button class="btn btn-primary">Envoyer</button>
</div>
</form>
@endsection