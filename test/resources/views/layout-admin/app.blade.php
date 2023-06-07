<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Mi Salon') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
   <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  
  	@guest
       <header class="header-section">
        <div class="container">
            <div class="header-content"> 
                <div class="logo-img">
                    <div class="logo">
                        <a href="#"><img src="images/logo.png"></a>
                     </div>
                </div>  
                <div class="sub-menu">                      
                    <nav class="nav-bar">
                                <a id="menu-toggle" class="navbar-toggle collapsed">
                                    <span class="icon-bar icon-bar-1"></span>
                                    <span class="icon-bar icon-bar-2"></span>
                                    <span class="icon-bar icon-bar-3"></span>
                                    <div class="Mobile__icon">
                                        <div class="mobile_close_icon">
                                            <svg fill="none" height="28" viewBox="0 0 28 28" width="28" xmlns="http://www.w3.org/2000/svg"><path d="M2.32129 2.32363C2.72582 1.9191 3.38168 1.9191 3.78621 2.32363L25.6966 24.234C26.1011 24.6385 26.1011 25.2944 25.6966 25.6989C25.2921 26.1035 24.6362 26.1035 24.2317 25.6989L2.32129 3.78854C1.91676 3.38402 1.91676 2.72815 2.32129 2.32363Z" fill="black"/><path d="M25.6787 2.30339C25.2742 1.89887 24.6183 1.89887 24.2138 2.30339L2.30339 24.2138C1.89887 24.6183 1.89887 25.2742 2.30339 25.6787C2.70792 26.0832 3.36379 26.0832 3.76831 25.6787L25.6787 3.76831C26.0832 3.36379 26.0832 2.70792 25.6787 2.30339Z" fill="black"/></svg>
                                        </div>
                                    </div>
                                </a>
                            <ul class="left">
                                
                                    <li class="active">
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Our App</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <div class="Register as Salon">
                                        <a href="{{ route('register') }}">{{ __('Register') }} as Salon</a>
                                    </div>
                                    @endif
                                    <div class="button-login">
                                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </div>
							
                            </ul>
                    </nav>
                    
               </div>   
            </div>
        </div>  
    </header>
    
     <footer class="main-footer">
                <div class="container">
                    <div class="main-footer-inner">
                  <div class="footer-logo">
                    <svg width="197" height="39" viewBox="0 0 197 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.72 38V9.8H7.12L16.36 30.48H15.04L24.24 9.8H30.68V38H24V20.72H25.72L17.72 38H13.56L5.52 20.72H7.36V38H0.72ZM35.9516 38V9.8H43.3516V38H35.9516ZM70.7313 38.44C68.4646 38.44 66.3046 38.1733 64.2513 37.64C62.2246 37.08 60.5179 36.3333 59.1313 35.4L61.2113 29.68C62.0913 30.24 63.0513 30.72 64.0913 31.12C65.1313 31.52 66.2113 31.84 67.3313 32.08C68.4779 32.2933 69.6379 32.4 70.8113 32.4C72.5713 32.4 73.7846 32.1733 74.4513 31.72C75.1446 31.2667 75.4913 30.68 75.4913 29.96C75.4913 29.32 75.2646 28.8267 74.8113 28.48C74.3579 28.1067 73.5046 27.7867 72.2513 27.52L67.3713 26.52C64.7846 25.9867 62.8513 25.0667 61.5713 23.76C60.2913 22.4267 59.6513 20.6933 59.6513 18.56C59.6513 16.6933 60.1446 15.08 61.1313 13.72C62.1446 12.3333 63.5579 11.2667 65.3713 10.52C67.1846 9.74667 69.3046 9.36 71.7313 9.36C73.7313 9.36 75.6113 9.64 77.3713 10.2C79.1313 10.7333 80.5713 11.48 81.6913 12.44L79.6113 17.8C78.5446 17.0267 77.3446 16.44 76.0113 16.04C74.6779 15.6133 73.1979 15.4 71.5713 15.4C70.0246 15.4 68.8513 15.64 68.0513 16.12C67.2779 16.5733 66.8913 17.2267 66.8913 18.08C66.8913 18.6667 67.1179 19.1733 67.5713 19.6C68.0513 20 68.9179 20.3333 70.1713 20.6L74.9713 21.56C77.5579 22.0667 79.4913 22.9733 80.7713 24.28C82.0779 25.5867 82.7313 27.2933 82.7313 29.4C82.7313 31.2133 82.2246 32.8 81.2113 34.16C80.2246 35.52 78.8379 36.5733 77.0513 37.32C75.2646 38.0667 73.1579 38.44 70.7313 38.44ZM83.1747 38L96.3747 9.8H102.375L115.655 38H108.255L104.855 30.24L107.695 32.28H91.1347L93.9347 30.24L90.5747 38H83.1747ZM99.3347 17.4L94.6547 28.56L93.5347 26.68H105.255L104.255 28.56L99.5347 17.4H99.3347ZM117.397 38V9.8H124.797V31.88H136.877V38H117.397ZM138.199 23.88C138.199 20.9467 138.773 18.4 139.919 16.24C141.066 14.0533 142.706 12.36 144.839 11.16C146.973 9.96 149.493 9.36 152.399 9.36C155.333 9.36 157.866 9.96 159.999 11.16C162.133 12.36 163.773 14.0533 164.919 16.24C166.093 18.4 166.679 20.9467 166.679 23.88C166.679 26.7867 166.093 29.3333 164.919 31.52C163.773 33.7067 162.133 35.4133 159.999 36.64C157.866 37.84 155.333 38.44 152.399 38.44C149.493 38.44 146.973 37.84 144.839 36.64C142.733 35.4133 141.093 33.7067 139.919 31.52C138.773 29.3333 138.199 26.7867 138.199 23.88ZM145.919 23.88C145.919 26.52 146.453 28.5867 147.519 30.08C148.586 31.5467 150.213 32.28 152.399 32.28C154.586 32.28 156.226 31.5467 157.319 30.08C158.413 28.5867 158.959 26.52 158.959 23.88C158.959 21.24 158.413 19.1867 157.319 17.72C156.226 16.2533 154.586 15.52 152.399 15.52C150.213 15.52 148.586 16.2533 147.519 17.72C146.453 19.16 145.919 21.2133 145.919 23.88ZM149.999 7.4L154.719 0.359998H161.839L154.879 7.4H149.999ZM171.108 38V9.8H176.548L190.828 27.52H189.668V9.8H196.508V38H191.068L176.868 20.28H178.028V38H171.108Z" fill="white"/>
                        </svg>
                  </div>
                  <div class="footer-menu">
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Our App</a></li>
                          <li><a href="#">Contact Us</a></li>
                      </ul>
                  </div>
                  <div class="footer-media">
                      <ul>
                          <li>
                              <a href="#">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.28955 0.054C6.24927 0.00981817 6.55527 0 9 0C11.4447 0 11.7507 0.0106364 12.7096 0.054C13.6685 0.0973636 14.3231 0.250364 14.8958 0.472091C15.4955 0.698727 16.0396 1.053 16.4896 1.51118C16.9478 1.96036 17.3013 2.50364 17.5271 3.10418C17.7496 3.67691 17.9018 4.33145 17.946 5.28873C17.9902 6.25009 18 6.55609 18 9C18 11.4447 17.9894 11.7507 17.946 12.7105C17.9026 13.6677 17.7496 14.3223 17.5271 14.895C17.3013 15.4956 16.9472 16.0398 16.4896 16.4896C16.0396 16.9478 15.4955 17.3013 14.8958 17.5271C14.3231 17.7496 13.6685 17.9018 12.7113 17.946C11.7507 17.9902 11.4447 18 9 18C6.55527 18 6.24927 17.9894 5.28955 17.946C4.33227 17.9026 3.67773 17.7496 3.105 17.5271C2.50439 17.3012 1.96022 16.9472 1.51036 16.4896C1.05249 16.0402 0.698167 15.4963 0.472091 14.8958C0.250364 14.3231 0.0981818 13.6685 0.054 12.7113C0.00981817 11.7499 0 11.4439 0 9C0 6.55527 0.0106364 6.24927 0.054 5.29036C0.0973636 4.33145 0.250364 3.67691 0.472091 3.10418C0.6985 2.5037 1.0531 1.9598 1.51118 1.51036C1.9604 1.05259 2.50402 0.698272 3.10418 0.472091C3.67691 0.250364 4.33145 0.0981818 5.28873 0.054H5.28955ZM12.6368 1.674C11.6877 1.63064 11.403 1.62164 9 1.62164C6.597 1.62164 6.31227 1.63064 5.36318 1.674C4.48527 1.71409 4.00909 1.86055 3.69164 1.98409C3.27191 2.14773 2.97164 2.34164 2.65664 2.65664C2.35804 2.94713 2.12824 3.30078 1.98409 3.69164C1.86055 4.00909 1.71409 4.48527 1.674 5.36318C1.63064 6.31227 1.62164 6.597 1.62164 9C1.62164 11.403 1.63064 11.6877 1.674 12.6368C1.71409 13.5147 1.86055 13.9909 1.98409 14.3084C2.12809 14.6986 2.358 15.0529 2.65664 15.3434C2.94709 15.642 3.30136 15.8719 3.69164 16.0159C4.00909 16.1395 4.48527 16.2859 5.36318 16.326C6.31227 16.3694 6.59618 16.3784 9 16.3784C11.4038 16.3784 11.6877 16.3694 12.6368 16.326C13.5147 16.2859 13.9909 16.1395 14.3084 16.0159C14.7281 15.8523 15.0284 15.6584 15.3434 15.3434C15.642 15.0529 15.8719 14.6986 16.0159 14.3084C16.1395 13.9909 16.2859 13.5147 16.326 12.6368C16.3694 11.6877 16.3784 11.403 16.3784 9C16.3784 6.597 16.3694 6.31227 16.326 5.36318C16.2859 4.48527 16.1395 4.00909 16.0159 3.69164C15.8523 3.27191 15.6584 2.97164 15.3434 2.65664C15.0528 2.35806 14.6992 2.12826 14.3084 1.98409C13.9909 1.86055 13.5147 1.71409 12.6368 1.674V1.674ZM7.85045 11.7745C8.49245 12.0417 9.20731 12.0778 9.87294 11.8765C10.5386 11.6752 11.1137 11.2491 11.5 10.6709C11.8864 10.0927 12.06 9.39835 11.9913 8.70636C11.9226 8.01437 11.6157 7.3677 11.1232 6.87682C10.8092 6.56303 10.4295 6.32276 10.0115 6.1733C9.59355 6.02385 9.14762 5.96893 8.70586 6.0125C8.2641 6.05608 7.83749 6.19705 7.45675 6.42529C7.07601 6.65352 6.75061 6.96334 6.50397 7.33242C6.25734 7.70151 6.09561 8.12069 6.03042 8.55979C5.96524 8.99888 5.99821 9.44697 6.12699 9.87179C6.25576 10.2966 6.47712 10.6876 6.77514 11.0166C7.07315 11.3456 7.4404 11.6044 7.85045 11.7745ZM5.72891 5.72891C6.15847 5.29934 6.66844 4.95859 7.2297 4.72611C7.79095 4.49363 8.3925 4.37398 9 4.37398C9.6075 4.37398 10.209 4.49363 10.7703 4.72611C11.3316 4.95859 11.8415 5.29934 12.2711 5.72891C12.7007 6.15847 13.0414 6.66844 13.2739 7.2297C13.5064 7.79095 13.626 8.3925 13.626 9C13.626 9.6075 13.5064 10.209 13.2739 10.7703C13.0414 11.3316 12.7007 11.8415 12.2711 12.2711C11.4035 13.1386 10.2269 13.626 9 13.626C7.7731 13.626 6.59646 13.1386 5.72891 12.2711C4.86136 11.4035 4.37398 10.2269 4.37398 9C4.37398 7.7731 4.86136 6.59646 5.72891 5.72891V5.72891ZM14.652 5.06291C14.7584 4.96249 14.8437 4.84174 14.9026 4.7078C14.9616 4.57385 14.993 4.42945 14.9952 4.28312C14.9973 4.1368 14.97 3.99154 14.915 3.85594C14.86 3.72033 14.7784 3.59715 14.6749 3.49367C14.5714 3.39019 14.4482 3.30853 14.3126 3.25351C14.177 3.1985 14.0317 3.17125 13.8854 3.17339C13.7391 3.17552 13.5947 3.20699 13.4607 3.26593C13.3268 3.32488 13.2061 3.4101 13.1056 3.51655C12.9103 3.72357 12.8034 3.99855 12.8076 4.28312C12.8117 4.5677 12.9266 4.83945 13.1279 5.04069C13.3291 5.24193 13.6008 5.35682 13.8854 5.36097C14.17 5.36512 14.445 5.2582 14.652 5.06291V5.06291Z" fill="#222222"/>
                                    </svg>
                                    
                              </a>
                          </li>
                          <li>
                            <a href="#">
                                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 1.73572C17.3381 2.02904 16.627 2.22722 15.8794 2.3168C16.6508 1.85526 17.2278 1.12885 17.503 0.273114C16.7783 0.703565 15.9851 1.00656 15.158 1.16891C14.6018 0.575042 13.8651 0.181415 13.0623 0.049144C12.2594 -0.0831267 11.4354 0.0533594 10.7181 0.437412C10.0007 0.821465 9.43028 1.4316 9.09525 2.17308C8.76022 2.91457 8.67936 3.74592 8.86523 4.53807C7.39683 4.46434 5.96033 4.08267 4.64898 3.41785C3.33762 2.75302 2.18071 1.81988 1.25333 0.678998C0.936228 1.22599 0.753898 1.86018 0.753898 2.5356C0.753544 3.14363 0.903276 3.74235 1.18981 4.27863C1.47634 4.81491 1.89082 5.27218 2.39646 5.60985C1.81005 5.59119 1.23658 5.43274 0.723773 5.14768V5.19525C0.723714 6.04803 1.0187 6.87458 1.55868 7.53463C2.09865 8.19468 2.85036 8.64759 3.68625 8.8165C3.14226 8.96372 2.57192 8.98541 2.01832 8.87991C2.25416 9.61369 2.71355 10.2553 3.33219 10.7151C3.95082 11.1748 4.69772 11.4295 5.46833 11.4436C4.16018 12.4706 2.54461 13.0276 0.881529 13.0252C0.586931 13.0252 0.292582 13.008 0 12.9736C1.68813 14.059 3.65322 14.6351 5.66018 14.6328C12.454 14.6328 16.168 9.00596 16.168 4.12584C16.168 3.96729 16.164 3.80716 16.1569 3.64861C16.8793 3.12617 17.5029 2.47923 17.9984 1.7381L18 1.73572V1.73572Z" fill="#222222"/>
                                    </svg>
                                    
                                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.84672 16V8.71352H8.51221L8.90842 5.86063H5.84672V4.04345C5.84672 3.22021 6.09544 2.65657 7.37661 2.65657H9V0.113057C8.21013 0.0349924 7.41618 -0.00270088 6.62179 0.000150394C4.26575 0.000150394 2.64814 1.32658 2.64814 3.76163V5.85529H0V8.70819H2.65392V16H5.84672Z" fill="#222222"/>
                                    </svg>
                            </a>
                        </li>
                      </ul>
                  </div>
                </div>
            </div>
            </footer>
            
            @else
              
        @include('layout-admin.nav-bar')
        @include('layout-admin.sidebar')
            
                 
        <!-- content -->
            @yield('content')
        <!-- end content -->
       
         @endguest
 

 
  
 <!--  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>



<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('dist/js/popup-script.js') }}"></script>
<script src="{{ asset('dist/js/script-upload-img.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
        $(".approved-saloon").click(function(){

                $.ajaxSetup({
    				headers: {
    					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                
                });  
            
                var accepted_saloon_id =  $(this).attr("accepted-saloon-id");
                    
                var password  = $('#generate_saloon_password-'+accepted_saloon_id).val();
                var  confirm_password  = $('#generate_confirm_password-'+accepted_saloon_id).val();
                  
                  if(password=="") {
                      alert('Please enter the password!')
                       return false;
                  } else if(confirm_password=="") {
                      
                      alert('Please enter the confirm password!')
                       return false;
                  } else if(password != confirm_password) {
                      
                      alert('Password not match!');
                      return false;
                  }
                  
                  else {
                        
                        $(".approved-saloon").append('&nbsp;<i class="fa fa-refresh fa-spin"></i>');
                        $('.approved-saloon').prop('disabled', true);
                     
                        $.ajax({
                        type:'POST',
                        url:"{{ url('admin-Saloon-accepted') }}",
                        data:{accepted_saloon_id:accepted_saloon_id,password,password},
                            success:function(data){
                            
                                
                            setInterval(function() {
                                 $('#modal-default-'+data).modal('toggle');
                                 setInterval(function() {
                                    
                                 swal("Saloon Updated!", "success");
                                   
                                    
                                $('.approved-saloon').prop('disabled', false);
                                 location.reload();
                                
                                },5000);
                                
                              
                                    
                            }, 3000);
                                
                            }
        
                    });
                     
                  }
                  
            }); 
        
     	$(".rejected-saloon").click(function(){
     	    
					$.ajaxSetup({
						headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
                    
                }); 
				
				 
				 var rejected_saloon_id =  $(this).attr("rejected-saloon-id");

				swal({	
					
					title: `Are you sure you want to Reject this record?`,
					text: "If you delete this, it will be gone forever.",
					icon: "warning",
					buttons: true,	
					dangerMode: true,

				}).then((willDelete) => {
					   
					if (willDelete) {
					    $(".rejected-saloon").append('&nbsp;<i class="fa fa-refresh fa-spin"></i>');
					     $('.rejected-saloon').prop('disabled', true);
						   $.ajax({
							type:'POST',
							url:"{{ url('admin-Saloon-rejected') }}",
							data:{rejected_saloon_id:rejected_saloon_id},
						
						success:function(data){
							swal("Data Deleted!", "success");
                            $('#modal-default-'+data).modal('toggle');
                            $('.rejected-saloon').prop('disabled', false);
                           
                           
                          setInterval(function() {
                                location.reload();
                        }, 3000);
                            swal("Saloon Rejected!", "success");
                        }
                    
                    });	
					return false;	
				}
			});
			
		});
</script>


  <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</body>
</html>
