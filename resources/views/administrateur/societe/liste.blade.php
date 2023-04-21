@extends('administrateur.layouts.app')

@section('content')
<div class="d-flex justify-content-between mt-4">
  <h2>Societès</h2>
  <a class="btn btn-outline-primary"  href="{{route('administrateur.societes.new.create')}}" >Nouveau</a>
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
              <th scope="col">ICE</th>
              <th scope="col">Site Web</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($societes as $societe)
            <tr>
              <td>{{$societe->id}}</td>
              <td>{{$societe->nom}}</td>
              <td>{{$societe->ice}}</td>
              <td>{{$societe->siteweb}}</td>
              <td><a href="{{route('administrateur.societes.edit.create',['id'=>$societe->id])}}">👁</a></td>
              <td><form method="post" action="{{route('administrateur.societes.delete',['id'=>$societe->id])}}">
                <input type="hidden" name="_method" value="DELETE">@csrf
                <button type="submit">❌</button>
              </form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection