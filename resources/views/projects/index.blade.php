@extends('projects.layout')

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
        
                <th>Project_url</th>
                <th>image</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->project_url }}</td>
                    <td>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" width="100">

                        @endif
                    </td>
                    <td>{{ ucfirst($project->status) }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


