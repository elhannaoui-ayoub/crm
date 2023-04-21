@extends('administrateur.layouts.app')

@section('content')
<div class="mt-4">
  <h2>Historique</h2>
  
</div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach($historiques as $historique)
            <tr>
              <td>{{$historique->id}}</td>
              <td>{{$historique->created_at}}</td>
              <td>{{$historique->detail}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection