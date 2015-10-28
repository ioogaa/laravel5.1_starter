@extends('layout/main')

@section('content')
<div class="col-md-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Ganti Password</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <!-- content starts here -->
      @include('errors/message')
        <form class="form-horizontal" role="form" method="POST" action="{{ url('changePassword') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <label class="col-md-4 control-label">Password lama</label>
            <div class="col-md-4">
              <input type="password" class="form-control" name="current_password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-4">
              <input type="password" class="form-control" name="password">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-4">
              <input type="password" class="form-control" name="password_confirmation">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Ganti password
              </button>
            </div>
          </div>
        </form>
      </div>

        <!-- content ends here -->
      </div>
    </div>
  </div>

@endsection
