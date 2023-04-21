@extends('administrateur.layouts.app')

@section('content')
<div class="d-flex justify-content-between mt-4">
  <h2>Administrateurs</h2>
  <a class="btn btn-outline-primary"  href="{{route('administrateur.administrateurs.new.create')}}" >Nouveau</a>
</div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          @if(Session::has('msg'))
          <div class="alert alert-success" role="alert">
              {{Session::get('msg')}}
          </div>
          @endif
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
            </tr>
          </thead>
          <tbody>
            @foreach($administrateurs as $administrateur)
            <tr>
              <td>{{$administrateur->id}}</td>
              <td>{{$administrateur->nom}}</td>
              <td><a href="{{route('administrateur.administrateurs.edit.create',['id'=>$administrateur->id])}}">👁</a></td>
              <td><form method="post" action="{{route('administrateur.administrateurs.delete',['id'=>$administrateur->id])}}">
                <input type="hidden" name="_method" value="DELETE">@csrf
                <button type="submit">❌</button>
              </form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection