@extends('layout/main')
@section('style')
<link href="{{ asset('template/production/js/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="col-md-12">
    <div class="x_panel">

    <div class="x_title">
        <h2>Dashboard</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <!-- content starts here -->
      @include('errors/message')
        <form class="form-horizontal" action="{{url('user/edit/'.$user->id)}}" method="POST" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Avatar</label>
            <div class="col-sm-10 fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                @if(!empty($profile))
                  @if($profile->avatar == null)
                    <img src="{{ asset('images/avatar/profile.png') }}" alt="...">
                  @else
                    <img src="{{ asset('images/avatar/'.$profile->avatar) }}" alt="...">
                  @endif
                @else
                  <img src="{{ asset('images/avatar/profile.png') }}" alt="...">
                @endif
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
              <div>
                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="avatar"></span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="" value="{{$user->name}}">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="john@example.com" value="{{$user->email}}">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="address" placeholder="" value="@if(!empty($profile)) {{ $profile->address }} @endif">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Phone number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="phone" placeholder="" value="@if(!empty($profile)) {{ $profile->phone }} @endif">
            </div>
          </div>

          <!-- @if(Auth::user()->is('admin'))
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-10">
              <select class="form-control" name="role">
                <option value="">- Select Role User -</option>
                @foreach($roles as $role)
                <option @if($user->roles[0]->id == $role->id) selected  @endif value="{{$role->id}}">{{$role->description}}</option>
                @endforeach
              </select>
            </div>
          </div>
          @endif -->
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Update</button>
            </div>
          </div>
        </form>

      <!-- content ends here -->
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('template/production/js/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
@endsection
