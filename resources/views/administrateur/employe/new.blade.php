@extends('administrateur.layouts.app')

@section('content')
@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
    {{Session::get('msg')}}
  </div>
@endif
<form action="{{route('administrateur.employes.inviter')}}" method="POST">@csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" >
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Societé</label>
<select class="form-select" name="societe" aria-label="Default select example">
    <option value="" hidden selected>Select</option>
    @foreach($societes as $societe)
        <option value="{{$societe->id}}" >{{$societe->nom}}</option>
    @endforeach
  </select>
</div>
<div class="mb-3">
 <button class="btn btn-primary">Envoyer</button>
</div>
</form>
@endsection