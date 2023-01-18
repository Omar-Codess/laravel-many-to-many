@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="text-center">Aggiungi un nuovo progetto</h2>
        <div class="row justify-content-center">
            <div class="col-8">
                @include('partials.errors')
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="type">Tipologia</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">Seleziona</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description">Descrizione</label>
                        <textarea rows="10" id="description" name="description" class="form-control" value="{{ old('description') }}"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
