@extends('layouts.admin')
@section('content')
  <div class="container my-3">
    <div class="p-2 row">
      <div class=" col-6">
        <img class="w-75" src="{{ asset('storage/' . $project->thumb) }}" alt="">
      </div>
      <div class="my-3 col-6">
        <h2 class="text-secondary">{{ $project->title }}</h2>
        <p class="text-secondary">{{ $project->description }}</p>
      </div>
    </div>
  </div>
@endsection
