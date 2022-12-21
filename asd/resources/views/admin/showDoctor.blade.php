<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center justify-content-between">
                    <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                    <button id="bannerClose" class="btn border-0 p-0">
                        <i class="mdi mdi-close text-white me-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding: 100px;">
        <div align="center" style="padding-top: 100px;">
            <table>
                <tr style="background-color: black;">
                    <th style="padding: 10px;">Doctor Name</th>
                    <th style="padding: 10px;">Phone Number</th>
                    <th style="padding: 10px;">Speciality</th>
                    <th style="padding: 10px;">Room Number</th>
                    <th style="padding: 10px;">image</th>
                    <th style="padding: 10px;">Delete</th>
                    <th style="padding: 10px;">Update</th>
                </tr>
                @foreach($data as $doctor)
                <tr align="center" style="background-color: #0d6efd">
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>{{$doctor->room}}</td>
                    <td><img height="100" width="100" src="doctorimage/{{$doctor->image}}"></td>
                    <td><a onclick="return confirm('Are you sure you want to delete this Doctor')" class="btn btn-danger" href="{{url('deleteDoctor',$doctor->id)}}">Delete</a></td>
                    <td><a class="btn btn-primary" href="{{url('updateDoctor',$doctor->id)}}">Update</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</div>
</body>
</html>
