@extends('projects.layout')

@section('content')
 
 
<div class="card">
  <div class="card-header">Projects Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Title : {{ $project->title }}</h5>
        <p class="card-text">Description : {{ $project->description }}</p>
        <p class="card-text">Project_url : {{ $project->project_url }}</p>
        <p class="card-text">Image : {{ $project->image }}</p>
        <p class="card-text">Status : {{ $project->status }}</p>
        </div>
       
    

      </div>
</div>