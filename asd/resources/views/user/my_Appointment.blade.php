<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Pirmam Hospital</title>

    <link rel="stylesheet" href="/assets/css/maicons.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="/assets/css/theme.css">
</head>
<body>



<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <a href="#"><span class="mai-call text-primary"></span> +964 750 737 5511</a>
                        <span class="divider">|</span>
                        <a href="#"><span class="mai-mail text-primary"></span> barzan@health.com</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-dribbble"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><span class="text-primary">Pirmam</span>-Hospital</a>

            <form action="#">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.html">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    @if(Route::has('login'))

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: #00D9A5; color:white" href="{{url('myAppointment')}}">My Appointments</a>
                            </li>
                            <x-app-layout>
                            </x-app-layout>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
                            </li>

                        @endauth

                    @endif
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>

<style>
    th, td {

        border-radius: 10px;
    }
</style>

<table align="center" style="padding: 70px;">
    <tr style="background-color: black;">
        <th style="padding: 10px; font-size:20px; color: white;">Doctors Name</th>
        <th style="padding: 10px; font-size:20px; color: white;">Date</th>
        <th style="padding: 10px; font-size:20px; color: white;">Message</th>
        <th style="padding: 10px; font-size:20px; color: white;">Status</th>
        <th style="padding: 10px; font-size:20px; color: white;">Cancel My Appointments</th>
    </tr>
    @foreach($appoint as $appoints)
    <tr style="background-color: #00D9A5 " align="center">

        <td style="padding: 10px;  color: black;">{{$appoints->doctor}}</td>
        <td style="padding: 10px;  color: black;">{{$appoints->date}}</td>
        <td style="padding: 10px;  color: black;">{{$appoints->message}}</td>
        <td style="padding: 10px;  color: black;">{{$appoints->status}}</td>
        <td><a class="bt btn-danger" onclick="return confirm('Are you sure You want to Cancel your Appointment')" href="{{url('cancel_appoint',$appoints->id)}}"  style="padding: 10px;  color: black;">Cancel </a></td>
    </tr>
    @endforeach
</table>
<script src="/assets/js/jquery-3.5.1.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="/assets/vendor/wow/wow.min.js"></script>

<script src="/assets/js/theme.js"></script>

</body>
</html>
