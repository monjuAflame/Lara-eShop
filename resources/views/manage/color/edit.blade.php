@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Color</h3>
              <a href="{{ route('color.index') }}" class="btn btn-primary btn-sm pull-right">Color List</a>
            </div>

            <form method="POST" action="{{ route('color.update',$color->id) }}">
            	@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="color_name">Color Name</label>
                  <input type="text" class="form-control" name="color_name" value="{{ $color->color_name }}" id="color_name" >
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" value="{{ $color->description }}" id="description">
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