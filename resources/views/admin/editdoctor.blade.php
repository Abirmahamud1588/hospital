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
        <div class="row mb-2">
          <div class="col-sm-4">

            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"> Update Doctor</h3>
                  @if(session()->has('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
              @endif
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update.doctor',$editdoc -> id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1"> Name</label>
                          <input type="text" value="{{ $editdoc -> name }}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                          @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1"> Phone</label>
                            <input type="text" value="{{ $editdoc -> phone }}" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1"> Speciality</label>
                         <select name="speciality" class="form-control" id="">

                            <option value="{{ $editdoc -> speciality }}">{{ $editdoc -> speciality }}</option>
                            <option value="nose">Nose</option>
                            <option value="eye">Eye</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                         </select>
                          </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Room No</label>
                      <input type="text" name="room" value="{{ $editdoc -> room }}"  class="form-control" id="exampleInputPassword1" placeholder="room">
                      @error('room')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"> Existing Image</label>
                        <img style="width: 170px;" src="{{ asset('images/doctorimage/'.$editdoc -> image) }}" alt="">



                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
          </div><!-- /.col -->

















        <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.foot')
















@endsection
