@extends('front.header')

@section('content')



<div class="container">
    <div class="row  justify-content-center">
        <div class="col-7 card my-5 ">
  <div class="card-header card-body text-center">
<h1>  My Appointment</h1>

  </div>

            <table class="table table-dark">
                <thead>
                  <tr>

                    <th scope="col">Doctor Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($appo as  $appoint)


                  <tr>


                    <td>{{ $appoint -> doctor }}</td>
                    <td>{{ $appoint -> date }}</td>
                    <td>{{ $appoint -> status }}</td>
                    <td> <a class="btn btn-danger" onclick="return confirm('Are sure to delete?')" href=" {{ route('del.appo',$appoint->id) }}">cancel</a> </td>


                  </tr>
                  @endforeach
                </tbody>
              </table>







        </div>
    </div>
</div>

@stop
