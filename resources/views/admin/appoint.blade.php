@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! adminnnnnn') }}
                </div>
            </div>
        </div>
    </div>
</div>




  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.head')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 justify-content-center">



          <div class="col-8 card">


            <div class="card-header card-body text-center">
                <h1>  All Appointment</h1>

                  </div>

                            <table class="table table-dark">
                                <thead>
                                  <tr>

                                    <th scope="col">Doctor Name</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Patient Phone</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Approved</th>
                                    <th scope="col">Cancel</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appos as  $appoint)


                                  <tr>


                         <td>{{ $appoint -> doctor }}</td>
                          <td>{{ $appoint -> name }}</td>
                         <td>{{ $appoint -> phone }}</td>
                      <td>{{ $appoint -> date }}</td>
                        <td>{{ $appoint -> status }}</td>
                       <td> <a class="btn btn-success"  href=" {{ route('approved.appo',$appoint->id) }}">Apporved</a> </td>
                       <td> <a class="btn btn-danger"  href=" {{ route('cancel.appo',$appoint->id) }}">cancel</a> </td>


                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
















          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.foot')
















@endsection
