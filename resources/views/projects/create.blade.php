@extends('projects.layout')

@section('content')

<div class="card">
  <div class="card-header">Add New Project</div>
  <div class="card-body">
      
      <form action="{{ route('projects.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <label>Description</label></br>
        <input name="description" id="description" class="form-control"></br>
        <label>Project_url</label></br>
        <input type="url" name="project_url" id="Project_url" class="form-control"></br>
        
        <label>Image</label></br>
        <input type="file" name="image" class="form-control">
        <!-- @if(isset($project) && $project->image)
        <img src="{{ asset('storage/' . $project->image) }}" width="100" class="mt-2">
         @endif -->

         <label>Status</label>
        <select name="status" class="form-control" required>
        <option value="draft">Draft</option>
        <option value="published">Published</option>
        </select>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
@endsection
