@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="text-start mt-4">
            <a class="btn btn-success" href="{{ route('admin.projects.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <h2 class="text-center">{{ $project->title }}</h2>
        <p class="text-center">{{ $project->type ? $project->type->name : 'Nessuna tipologia' }}</p>
        <p class="mt-3">
            @forelse ($project->technologies as $technology)
                <span>#{{ $technology->title }} </span>
            @empty
                <span>Technologia non specificata</span>
            @endforelse
        </p>
        <div class="mt-3 text-center">
            <img class="w-50" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
        </div>
        <p class="mt-3">{{ $project->description }}</p>
    </div>
@endsection
