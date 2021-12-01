@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ url('style.css') }}" />

@section('content')

 <div class="d-flex justify-content-between">

    @auth
      <div class="col-md-2">
        <div class="card" style="width: 12rem;">
          <div class="bg-light">
            @include('partials.side-bar')
          </div>
        </div> 
      </div>
    @endauth

    <div class="card col-md-9 mx-auto">
      <div class="card-body">
        <h1 class="card-title">Create project</h1>
           <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
              @method('POST')
              @csrf
              <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" rows="1" required value="{{ old('name') }}"> 
                @error('name') 
                <small class='text-danger'>{{$message}}</small>
                @enderror   
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Intro</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="intro" rows="2" required>{{ old('intro') }}</textarea>
                  @error('intro') 
                  <small class='text-danger'>{{$message}}</small>
                  @enderror   
              </div>
            </div>
              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea id="editor" class="form-control" name="description" required>{{ old('description') }}</textarea>
                    @error('description') 
                      <small class='text-danger'>{{$message}}</small>
                    @enderror  
                </div>
              </div>
              <div class="form-group row">
               <label class="col-sm-2 col-form-label">Project image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="project_image">
                    @error('project_image') 
                    <small class='text-danger'>{{$message}}</small>
                    @enderror  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Start date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="start_date">
                      @error('start_date') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror   
                  </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">End date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="end_date">
                      @error('end_date') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror   
                  </div>
                </div>
                <button type="submit" class="btn btn-primary float-md-end">Submit project</button>
              <a href="/projects" class="mr-2 float-md-end">Cancel</a>
           </form>       
        </div>
      </div> 

        <script>
          ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
        </script>

        <script>
          $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
         });
         </script>


   </div>
@endsection