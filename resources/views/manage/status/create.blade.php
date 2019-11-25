@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Status</h3>
              <a href="{{ route('status.index') }}" class="btn btn-primary btn-sm pull-right">Status List</a>
            </div>

            <form method="POST" action="{{ route('status.store') }}" enctype= 'multipart/form-data'>
            	@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="status">Status Name</label>
                  <input type="text" class="form-control" name="status" value="{{ old('status') }}" id="status" placeholder="Status Name">
                </div>
                <div class="form-group">
                  <label for="status">Status Class</label>
                  <input type="text" class="form-control" name="class" value="{{ old('class') }}" id="status" placeholder="Status Class">
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