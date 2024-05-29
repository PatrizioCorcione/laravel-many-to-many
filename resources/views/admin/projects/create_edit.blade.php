@extends('layouts.admin')

@section('content')
  <div class="container form my-3 ">
    <form action={{ $route }} method="POST" class=" g-3" enctype="multipart/form-data">
      @csrf
      @method($method)

      <div class="mb-3">
        @if ($method == 'PUT')
          <label for="exampleInputEmail1" class="form-label text-secondary">Titolo</label>
        @endif
        <input value="{{ old('title', $project?->title) }}" name="title" placeholder="Titolo" type="text"
          class="text-secondary rounded-2 me-2 bg-black border-primary px-2 w-100 @error('title')
          is-invalid
          @enderror">
        @error('title')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="form-floating mb-3">

        <textarea value="" name="description"
          class="text-secondary rounded-2 me-2 bg-black border-primary px-2 w-100 t-area-he @error('description')
        is-invalid
        @enderror"
          id="floatingTextarea2Disabled">{{ old('description', $project?->description) }}</textarea>

        @error('description')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <select name="type_id" class="text-secondary rounded-2 my-3  bg-black border-primary px-2 w-100"
        aria-label="Default select example">
        @foreach ($types as $item)
          <option @if (old('type_id', $item->project?->id) == $item->id) selected @endif value="{{ $item->id }}">
            {{ $item->type }}
          </option>
        @endforeach

      </select>
      <div class="mb-3">
        @if ($method == 'PUT')
          <label for="exampleInputEmail1" class="form-label text-secondary mt-3">Github link</label>
        @endif

        <input value="{{ old('github', $project?->github) }}" name="github" placeholder="Github link" type="text"
          class="text-secondary rounded-2 me-2 bg-black border-primary px-2 w-100  @error('github')
          is-invalid
          @enderror">
        @error('github')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3">
        @if ($method == 'PUT')
          <label for="exampleInputEmail1" class="form-label text-secondary">Immagine</label>
        @endif
        <div class="input-group rounded-2 border border-2 border-primary overflow-hidden">
          <input name="thumb" type="file"
            class="text-secondary  bg-black border-primary w-100 in @error('thumb') is-invalid @enderror"
            id="inputGroupFile02">
        </div>
        @error('thumb')
          <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
        <div class="btn-group my-3" role="group" aria-label="Basic checkbox toggle button group">

          @foreach ($technologies as $item)
            <input name="technologies[]" type="checkbox" class="btn-check" id="technology_{{ $item->id }}"
              value="{{ $item->id }}" autocomplete="off" @if (($errors->any() && in_array($item->id, old('technologies', []))) || $project?->technologies->contains($item)) checked @endif>

            <label class="btn btn-outline-primary"
              for="technology_{{ $item->id }}">{{ $item->technologies }}</label>
          @endforeach

        </div>
        <button type="submit" class="btn btn-primary float-end mt-5">Invia</button>
      </div>

    </form>
  </div>
@endsection
