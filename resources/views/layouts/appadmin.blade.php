{{-- header section start --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
<link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('backend/images/logo_2H_tech.png')}}" />
</head>
<body>
  <div class="container-scroller">
    @include('adminsidebar.navbar1')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('adminsidebar.navbar2')
      <div class="main-panel">
        <div class="content-wrapper">
{{-- header section end --}}
{{-- content --}}
@yield('content')
{{-- content --}}


{{-- footer start --}}
 @include('include.adminfooter')
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<!-- End custom js for this page-->
</body>

</html>


{{-- footer end --}}

{{-- script --}}

@include('adminsidebar.adminscript')
{{-- script ended --}}