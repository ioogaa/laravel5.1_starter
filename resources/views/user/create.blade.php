@extends('layout/main')

@section('content')
<div class="col-md-12">
    <div class="x_panel">

    <div class="x_title">
        <h2>Users</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <!-- content starts here -->
      @include('errors/message')
    <form class="form-horizontal" action="{{url('user/store')}}" method="POST">
      {!! csrf_field() !!}
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" placeholder="" value="{{ old('name') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="john@example.com" value="{{ old('email') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password_confirmation" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Role</label>
        <div class="col-sm-10">
          <select class="form-control" name="role">
            <option value="">- Select Role User -</option>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->description}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Create</button>
        </div>
      </div>
    </form>

      <!-- content ends here -->
    </div>
  </div>
</div>
@endsection
