@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Status</h3>
              <a href="{{ route('status.index') }}" class="btn btn-primary btn-sm pull-right">Status List</a>
            </div>

            <form method="POST" action="{{ route('status.update',$status->id) }}" enctype= 'multipart/form-data'>
            	@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="status">Status Name</label>
                  <input type="text" class="form-control" name="status" value="{{ $status->status }}" id="status" >
                </div>
                <div class="form-group">
                  <label for="class">Status Class</label>
                  <input type="text" class="form-control" name="class" value="{{ $status->class }}" id="class" >
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