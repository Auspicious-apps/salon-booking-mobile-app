@extends('layout-user.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Agenda Salon Name</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!--<div class="submit_section">-->
    <!--    <div class="date">-->
    <!--      <form>-->
    <!--      <input type="date" id="calender" name="calender">-->
    <!--      <input type="submit">-->
    <!--    </form>-->
    <!--  </div>-->
    <!--  <div class="appoinment">-->
    <!--    <a href="servicepage.html"><img src="dist/img/plus.png">New Appointment</a>-->
    <!--  </div>-->
    <!--</div>-->
    <div class="metting-schedule">
      <div class="grid-1 white">
        <h3 class="heading blue">Time</h3>
         <ul class="timming">           
            <li>10:00</li>
            <li>10:15</li>
            <li>10:30</li>
            <li>10:45</li>
            <li>11:00</li>
            <li>11:15</li>
            <li>11:30</li>
            <li>11:45</li>
            <li>12:00</li>
            <li>12:15</li>
            <li>12:30</li>
            <li>12:45</li>
            <li>13:00</li>
          </ul> 
      </div>  
	  
	  @if(!empty($getStaffMember)) 
	  @foreach($getStaffMember as $data)

	  
       <div class="grid-2 white">
        <div id="{{ $data->id }}" class="modal" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header header-top">
                    <div class="top-header">
                      <img src="dist/img/pop-img.png">
                      <div class="pop-img-text">
                        <h3>@if(!empty($data->first_name)) {{ $data->first_name }} @endif</h3>
                        <h4>@if(!empty($getSalon_Name->saloon_name)) {{ $getSalon_Name->saloon_name }} @endif</h4>
                       </div> 
                        </div>
                        
                      <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
                     
                  </div>
                  <div class="modal-body header-top">
                      <h2 class="details">Appointment Details</h2>
                      <div class="detail-grid">
                        <div class="detail-grid-left">
                          <ul class="main-name">
                            <li> @if(!empty($results->customer_id)) {{ $results->customer_id }} @endif</li>
                            <li>Services
                              <ul class="sub-name">
                                <li></li>
                                <li>Beard Shaving</li>
                                <li class="black">Total Cost</li>
                              </ul>
                            </li>
                            <li>Phone Number</li>
                            <li>Email Address</li>
                          </ul>
                        </div>
                        <div class="detail-grid-right">
                          <ul class="main-name">
                            <li>Angelo Blick</li>
                            <li>
                              <ul class="sub-name p-top">
                                <li>€ 6.99</li>
                                <li>€ 4.99</li>
                                <li class="black">€ 11.98</li>
                              </ul>
                            </li>
                            <li>{{ $data->phone }}</li>
                            <li>{{ $data->email }}</li>
                          </ul>
                        </div>
                      </div>
                  </div>
                  <!--<div class="modal-footer center mian-popup">-->
                  <!--  <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Edit</button>-->
                  <!--  <button type="button" class="close-btn close close-button">Cancel</button>-->
                  <!--</div>-->
              </div>
          </div>
        </div>
		
		
         <h3 class="heading red"> @if(!empty($data->first_name)) {{ $data->first_name }} @endif</h3>
        
         <div class="otherPages" data-modal="{{ $data->id }}">
          <div class="block1 red h-30 border show-modal ">
            <div class="top">
              <h5>Alberto Torresi</h5>
              <p>Hair Cutting</p>
              <p>Beard Shaving</p>
            </div>
            <div class="bottom">
              <h6>Estd Time : 30 mint</h6>
            </div>
         </div> 
       </div>
       
      </div>
   
        @endforeach

    @endif
    <!-- /.content-header -->

    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->

@endsection
