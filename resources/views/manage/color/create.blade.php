@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Color</h3>
              <a href="{{ route('color.index') }}" class="btn btn-primary btn-sm pull-right">Color List</a>
            </div>

            <form method="POST" action="{{ route('color.store') }}" enctype= 'multipart/form-data'>
            	@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="color_name">Color Name</label>
                  <input type="text" class="form-control" name="color_name" value="{{ old('color_name') }}" id="color_name" placeholder="Color Name">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description') }}" id="description" placeholder="description">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
          </div>
    </section>

@endsection