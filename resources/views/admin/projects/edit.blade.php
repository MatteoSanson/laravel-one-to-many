@extends('layouts.admin')

@section('content')
    <div class="my-3">
        <h1>Aggiorna info di {{ $project->title }}</h1>
    </div>
    <div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf

            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type"
                    value="{{ old('type', $project->type) }}">
                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="visibility">
                    <option value="public" {{ $project->visibility == 'public' ? 'selected' : '' }}>public</option>
                    <option value="private" {{ $project->visibility == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
