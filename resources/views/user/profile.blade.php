@extends('layout/main')

@section('content')
<div class="col-md-12">
    <div class="x_panel">

    <div class="x_title">
        <h2>Profile</h2>
        <div class="clearfix"></div>
    </div>


    <div class="x_content">
      <!-- content starts here -->
      @include('errors/message')
      <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
          <div class="profile_img">
              <div id="crop-avatar">
              <!-- Current avatar -->
                <div class="avatar-view" title="Change the avatar">
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
              </div>
              <!-- end of image cropping -->
          </div>
          <h3>{{ $user->name }}</h3>
          <ul class="list-unstyled user_data">
            <li><i class="fa fa-map-marker user-profile-icon"></i> @if(!empty($profile->address)) {{ $profile->address }} @else ------ @endif</li>
            <li><i class="fa fa-phone user-profile-icon"></i>  @if(!empty($profile->address)) {{ $profile->phone }} @else ------ @endif</li>
          </ul>
          <a href="{{ url('user/detail/'.$user->id) }}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
          <br />
      </div>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a></li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a></li>
            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <!-- start recent activity -->
                <ul class="messages">
                  <li>
                    @if(!empty($profile))
                      @if($profile->avatar == null)
                        <img src="{{ asset('images/avatar/profile.png') }}" alt="..." class="avatar">
                      @else
                        <img src="{{ asset('images/avatar/'.$profile->avatar) }}" alt="..." class="avatar">
                      @endif
                    @else
                      <img src="{{ asset('images/avatar/profile.png') }}" alt="..." class="avatar">
                    @endif
                      <div class="message_date">
                        <h3 class="date text-info">24</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Desmond Davison</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br />
                      </div>
                  </li>
                </ul>
                <!-- end recent activity -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

              <!-- start user projects -->
              <table class="data table table-striped no-margin">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Client Company</th>
                    <th class="hidden-phone">Hours Spent</th>
                    <th>Contribution</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>New Company Takeover Review</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">18</td>
                    <td class="vertical-align-mid">
                      <div class="progress">
                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- end user projects -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
              <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
            </div>
          </div>
        </div>
      </div>

          <!-- content ends here -->
        </div>
    </div>
  </div>
@endsection
