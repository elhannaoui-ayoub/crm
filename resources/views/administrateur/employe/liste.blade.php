@extends('administrateur.layouts.app')

@section('content')
<div class="d-flex justify-content-between mt-4">
    <h2>Employes</h2>
    <a class="btn btn-outline-primary"  href="{{route('administrateur.employes.create')}}" >Nouveau</a>
  </div>
      <div class="table-responsive">
        @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{Session::get('msg')}}
        </div>
        @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Email</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($employes as $employe)
            <tr>
              <td>{{$employe->id}}</td>
              <td>{{$employe->nom}}</td>
              <td>{{$employe->email}}</td>
              <td>{{$employe->estValide==0?"Non validé":"Validé"}}</td>
              {{-- <td><a href="{{route('administrateur.employes.edit.create',['id'=>$employe->id])}}">👁</a></td> --}}     
           <td>@if($employe->estValide==0)<a href="{{route('administrateur.employes.invitation.cancel',['id'=>$employe->id])}}" class="btn btn-primary">Annuler l'invitation</a>@endif</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection