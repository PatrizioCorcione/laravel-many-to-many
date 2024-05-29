@extends('layouts.admin')
@section('content')
  <div class="container my-3">

    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @if (session('deleted'))
      <div class="alert alert-primary" role='alert'>
        {{ session('deleted') }}
      </div>
    @endif

    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col"><a class="text-decoration-none"
              href="{{ route('admin.orderby', ['direction' => $direction, 'column' => 'id', 'toSearch' => request('toSearch')]) }}">ID</a>
          </th>
          <th scope="col"><a class="text-decoration-none"
              href="{{ route('admin.orderby', ['direction' => $direction, 'column' => 'title', 'toSearch' => request('toSearch')]) }}">Titolo</a>
          </th>

          <th scope="col"><a class="text-decoration-none"
              href="{{ route('admin.orderby', ['direction' => $direction, 'column' => 'type_id', 'toSearch' => request('toSearch')]) }}">Tipi</a>
          </th>
          <th scope="col">
            Github
          </th>
          <th scope="col">
            Tecnologie
          </th>
          <th class="text-end " scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($project as $item)
          <tr>
            <form action="{{ route('admin.project.update', $item) }}" method="POST" id="form-edit-{{ $item->id }}">
              @csrf
              @method('PUT')
              <td>
                {{ $item->id }}

              </td>
              <td>
                {{ $item->title }}
              </td>

              <td>
                {{ $item->type?->type }}
              </td>
              <td>
                <a target="_blanck" href="https://github.com/PatrizioCorcione/laravel-auth">
                  {{ $item->github }}
                </a>
              </td>
              <td>
                @forelse ($item->technologies as $tech)
                  <span class="badge bg-primary">{{ $tech->technologies }} </span>
                @empty
                  <p class="badge bg-danger m-0">Nessuna tecnologia usata</p>
                @endforelse
              </td>
            </form>
            <td class="d-flex flex-row-reverse ">
              <form class="d-inline-block" action="{{ route('admin.project.destroy', $item->id) }}" method="POST"
                onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger  index-btn"><i
                    class="fa-solid fa-circle-xmark"></i></button>
              </form>
              <a href="{{ route('admin.project.edit', $item) }}" class="btn btn-outline-warning index-btn mx-2">
                <i class="fa-solid fa-pen-nib "></i></a>
              <a href="{{ route('admin.project.show', $item) }}" class="btn btn-outline-primary index-btn">
                <i class="fa-solid fa-eye "></i></a>
              </a>
            </td>
          </tr>
        @empty
          <h2>Nessun elemento presente</h2>
        @endforelse
      </tbody>
    </table>
    {{ $project->links('pagination::bootstrap-5') }}
  </div>
@endsection
