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
    <table id="example" class="table table-striped responsive-utilities jambo_table" cellspacing="0" width="100%">
      <thead>
        <th class="col-md-1">No.</th>
        <th class="col-md-4 text-center">Nama</th>
        <th class="col-md-4 text-center">Email</th>
        <th class="col-md-4 text-center">Option</th>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach ($users as $user)
          <tr>
            <td>{{$no}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
              <form class="text-center form-inline" action="{{url('forgotPassword')}}" method="post">
                <a href="{{url('user/detail/'.$user->id)}}" class="btn btn-info btn-xs">edit</a>
                <input type="hidden" name="email" value="{{$user->email}}">
                <input type="submit" class="btn btn-xs btn-warning" value="reset password">
                @if($user->id !== Auth::user()->id)
                  <a href="{{url('user/delete/'.$user->id)}}" class="btn btn-danger btn-xs">delete</a>
                @endif
              </form>
            </td>
          </tr>
          <?php $no++; ?>
        @endforeach

      </tbody>
    </table>
    <!-- content ends here -->
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {

    var oTable = $('#example').dataTable({
        "oLanguage": {
          "sSearch": "Search all columns:"
        },
        "aoColumnDefs": [
          {
            'bSortable': false,
            'aTargets': [0]
          } //disables sorting for column one
        ],
        'iDisplayLength': 12,
        "sPaginationType": "full_numbers",
        "dom": 'T<"clear">lfrtip'
      });

  });
</script>
@endsection
