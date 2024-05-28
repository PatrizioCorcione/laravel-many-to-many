@extends('layouts.admin')
@section('content')
  <div class="container my-3">
    <div class="p-2">
      <div class="d-flex justify-content-center">
        <img class="w-75" src="{{ asset('storage/' . $project->thumb) }}" alt="">
      </div>
      <div class="my-3">
        <h2>{{ $project->title }}</h2>
        @forelse ($project->technologies as $item)
          <span class="badge bg-primary ">{{ $item->technologies }} </span>
        @empty
          <p class="badge bg-danger ">Nessuna tecnologia usata</p>
        @endforelse
        <p>{{ $project->description }}</p>
      </div>
    </div>
  </div>
@endsection
