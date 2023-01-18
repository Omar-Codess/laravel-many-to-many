@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="text-center">
            Modifica {{ $project->title }}
        </h2>
        <div class="row justify-content-center">
            <div class="col-8">
                @include('partials.errors')
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $project->title) }}">
                    </div>

                    <div class="mb-3">
                        <label for="type">Tipologia</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">Seleziona</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id', $project->type_id) == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <h5>Technologie</h5>
                        {{-- collection: [object1, object2, ...] --}}
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                    class="form-check-input" value="{{ $technology->id }}" @checked($errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology))>

                                <label for="technology-{{ $technology->id }}"
                                    class="form-check-label">{{ $technology->title }}</label>
                            </div>
                        @endforeach

                    </div>


                    <div class="mb-3">
                        <label for="cover_image">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" rows="10" class="form-control">{{ old('description', $project->description) }}</textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
