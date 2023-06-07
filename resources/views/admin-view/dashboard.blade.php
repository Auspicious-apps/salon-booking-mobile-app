@extends('layout-admin.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"> Agenda Salon Name  </h1>
           <div class="date-timing-block">
                <input type="text" id="calender" name="calender" placeholder="Fechas" class="input__item">
              <button  id ="test">
                Seleccione
              </button>
            </div>
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
    <div class="metting-schedule salon-timing-block">
      <!-- <div class="grid-1 white">
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
      </div>  --> 

      <input type="hidden" id="saloon_id" class="saloon_id" value="<?php echo $send_saloon_id; ?>">
    
    @if(!empty($getStaffMember)) 
      @foreach($getStaffMember as $data)

      <div class="grid-2 white">
      @php
        $current_date = Carbon\Carbon::now()->format('Y-m-d');
        $my_appointment = App\Appointment::where('staff_id',$data->id)->where('date',$current_date)->get();
        
      @endphp
        
        <h3 class="heading" style="background-color:{{ $data->color }};"> @if(!empty($data->first_name)) {{ $data->first_name }}  @endif</h3>
         @foreach($my_appointment as $app)

         @if($app->status!=0)

         @php
           $customer_data = App\User::where('id',$app->customer_id)->first();
         @endphp

          
         <div class="otherPages" data-modal="{{$app->start_time}}">
          <div class="block1  h-30 border show-modal " style="background-color:{{ $data->color }};">
            <div class="top">
              <h5><?php  if(!empty($customer_data->first_name)) {  echo $customer_data->first_name;} else { echo $app->first_name;} ?></h5>
              <p>@php
                $service_data = App\SalonTreatment::where('id',$app->services_taken)->first();
                 @endphp

                @if(!empty($service_data->treatment_name)) {{$service_data->treatment_name}} @else  @endif
              </p>
            </div>
            <div class="bottom">
            <h6>Booking Date:   @if(!empty($app->date)) {{ $app->date }} @else @endif</h6>
              <h6>Booking Time:@if(!empty($app->start_time)) {{ $app->start_time }} @else @endif </h6>
              <h6>Duration :</h6><h6> @if(!empty($service_data->treatment_hours)) {{$service_data->treatment_hours}} @else  @endif <span>Hour(s)</span>@if(!empty($service_data->treatment_minute)) {{$service_data->treatment_minute}} @else  @endif<span>Mins</span></h6>
            </div>
         </div> 
       </div>

        <div id="{{$app->start_time}}" class="modal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header header-top">
              <div class="top-header">   
                <img src="{{ asset('public/staff_images/'.$data->image) }}">
                <div class="pop-img-text">
                  <h3>@if(!empty($data->first_name)) {{ $data->first_name }} @endif</h3>
                   </div> 
                </div>
                
                <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
               
              </div>
              <div class="modal-body header-top">
                <h2 class="details"> Appointment Details </h2>

                <div class="detail-grid detail-new-grid">

             <ul class="main-name">
                <li><span>Customer Name </span><span>@if(!empty($customer_data->first_name))  {{ $customer_data->first_name}} @else {{ $app->first_name }} @endif     @if(!empty($customer_data->last_name)) {{$customer_data->last_name }} @else  {{ $app->last_name }} @endif</span></li>
               </ul>


              <ul class="main-name">
                <li>Services</li>
                <ul class="sub-name">
               <li><span>@if(!empty($service_data->treatment_name)) {{$service_data->treatment_name }} @else @endif</span><span> @if(!empty($app->total_cost)) {{ $app->total_cost }} @else @endif </span></li>
               <li><span>Total Cost </span><span>@if(!empty($app->total_cost)) {{ $app->total_cost }} @else @endif</span></li>
             </ul>
               </ul>
             <ul class="main-name">
               <li><span>Phone Number</span><span>@if(!empty($app->phone)) {{ $app->phone }} @else @endif</span></li>
                  <li><span>Email Address</span><span>@if(!empty($app->email)) {{ $app->email }} @else @endif</span></li>
               </ul>
                </div>

          
              </div>
          
            </div>
          </div>
        </div>
        @endif
       @endforeach
       
      </div>
   
        @endforeach

    @endif
    <!-- /.content-header -->

    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>


    $("#test").click(function() { 

        var dateString  =  $('#calender').val();

        if (dateString != "") {

        var saloon_id = $('#saloon_id').val();
        var url = "{{ url('admin', '') }}"+"/"+dateString+"/"+saloon_id;
        window.location.href = url;

      }  else {
               alert('Please select calender field')
              return false;
          }

}); 


  // $( function() {
  //   $( "#datepicker" ).datepicker();
  // } );
  // function me(){
  //           var date = $('#datepicker').datepicker('getDate');

  //           var saloon_id = $('#saloon_id').val();
  //           // alert(saloon_id);
  //           // return false;

  //           var dateString = $.datepicker.formatDate("dd-mm-yy", date);
  //           var url = "{{ url('admin', '') }}"+"/"+dateString+"/"+saloon_id;
  //           window.location.href = url;
  //        }
  </script>




<script>
  $(function(){
  $('.input__item').datepicker({ 
    dateFormat: 'yy-mm-dd',
    showOtherMonths: true,
    showMonthAfterYear: true,  
    changeYear: true,
    changeMonth: true,
    showOn: 'both',
    buttonImage:  'https://www.mi-salon.es/public/salon_images/calender.png',
    buttonImageOnly: true, 
    showAnim: '', 
    onSelect: function () {
            layer.removeClass('show'); //hide back layer when date selected
        }
  });
  
  
  $('#datepicker').datepicker('setDate','today'); // set date as todat

  
  
  // custom datepicker 
    var calendar = $('#ui-datepicker-div');

    calendar.before('<div class="datepicker-layer"></div>'); // add back layer

    var layer = $('.datepicker-layer'),
        datepicker = $('.hasDatepicker'),
        date = $('.ui-datepicker-calendar tbody a');

    // back layer show
    datepicker.on('click, focus', function () {
        if (calendar.css('display') == 'block') {
            layer.addClass('show');
        }
    });

    //back layer hide
    $(window).on('click', function (e) {
        if (layer.is(e.target)) {
            layer.removeClass('show');
        } if (calendar.css('display') == 'none') {
            layer.removeClass('show');
        }
    });
});


</script>












  
 <!--  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Agenda Salon Name</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="submit_section">
        <div class="date">
          <form>
          <input type="date" id="calender" name="calender">
          <input type="submit">
        </form>
      </div>
      <div class="appoinment">
        <a href="servicepage.html"><img src="dist/img/plus.png">New Appointment</a>
      </div>
    </div>
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
       <div class="grid-2 white">
        <div id="modalOne" class="modal" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header header-top">
                    <div class="top-header">
                      <img src="dist/img/pop-img.png">
                      <div class="pop-img-text">
                        <h3>Antonio brown</h3>
                        <h4>Antonio Hair Saloon</h4>
                       </div> 
                        </div>
                      <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
                     
                  </div>
                  <div class="modal-body header-top">
                      <h2 class="details">Appointment Details</h2>
                      <div class="detail-grid">
                        <div class="detail-grid-left">
                          <ul class="main-name">
                            <li>Customer Name</li>
                            <li>Services
                              <ul class="sub-name">
                                <li>Hair Cutting</li>
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
                            <li>+66 113 456 7894</li>
                            <li>Blickangelo22@xyz.com</li>
                          </ul>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer center mian-popup">
                    <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Edit</button>
                    <button type="button" class="close-btn close close-button">Cancel</button>
                  </div>
              </div>
          </div>
        </div>
        <h3 class="heading red">Antonio</h3>
         <div class="otherPages" data-modal="modalOne">
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


        <div class="grid-3  white">
        <div id="modaltwo" class="modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-top">
                      <div class="top-header">
                        <img src="dist/img/pop-img.png">
                        <div class="pop-img-text">
                          <h3>Angel black</h3>
                          <h4>Angel Hair Saloon</h4>
                         </div> 
                          </div>
                        <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
                       
                    </div>
                    <div class="modal-body header-top">
                        <h2 class="details">Appointment Details</h2>
                        <div class="detail-grid">
                          <div class="detail-grid-left">
                            <ul class="main-name">
                              <li>Customer Name</li>
                              <li>Services
                                <ul class="sub-name">
                                  <li>Hair Cutting</li>
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
                              <li>Angel Slick</li>
                              <li>
                                <ul class="sub-name p-top">
                                  <li>€ 7.99</li>
                                  <li>€ 5.99</li>
                                  <li class="black">€ 15.98</li>
                                </ul>
                              </li>
                              <li>+66 583 006 7004</li>
                              <li>Blickangelo25@xyz.com</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer center mian-popup">
                        <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Edit</button>
                        <button type="button" class="close-btn close close-button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
         <h3 class="heading yellow">Dominic</h3>
             <div class="otherPages" data-modal="modaltwo">
                <div class="block1 h-45 yellow border modal-button">
                  <div class="top">
                    <h5>Alberto Torresi</h5>
                    <p>Hair Cutting</p>
                    <p>Beard Shaving</p>
                  </div>
                  <div class="bottom">
                    <h6>Estd Time : 45 mint</h6>
                  </div>
               </div>
         </div> 
        </div>


         <div class="grid-4 white">
            <div id="modalthree" class="modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-top">
                      <div class="top-header">
                        <img src="dist/img/pop-img.png">
                        <div class="pop-img-text">
                          <h3>Robart black</h3>
                          <h4>Robart Hair Saloon</h4>
                         </div> 
                          </div>
                        <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
                       
                    </div>
                    <div class="modal-body header-top">
                        <h2 class="details">Appointment Details</h2>
                        <div class="detail-grid">
                          <div class="detail-grid-left">
                            <ul class="main-name">
                              <li>Customer Name</li>
                              <li>Services
                                <ul class="sub-name">
                                  <li>Hair Cutting</li>
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
                              <li>Robart</li>
                              <li>
                                <ul class="sub-name p-top">
                                  <li>€ 5.99</li>
                                  <li>€ 8.99</li>
                                  <li class="black">€ 18.98</li>
                                </ul>
                              </li>
                              <li>+76 583 016 72504</li>
                              <li>Robart55@xyz.com</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                   <div class="modal-footer center mian-popup">
                        <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Edit</button>
                        <button type="button" class="close-btn close close-button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="heading green">John</h3>
           <div class="otherPages" data-modal="modalthree">
          <div class="block1 h-1 green  border show-modal">
            <div class="top">
              <h5>Alberto Torresi</h5>
              <p>Hair Cutting</p>
              <p>Beard Shaving</p>
            </div>
            <div class="bottom">
              <h6>Estd Time : 1 hour</h6>
            </div>
         </div> 
       </div>
         </div>


          <div class="grid-5  white">
               <div id="modalfour" class="modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-top">
                      <div class="top-header">
                        <img src="dist/img/pop-img.png">
                        <div class="pop-img-text">
                          <h3>Criss black</h3>
                          <h4>Criss Hair Saloon</h4>
                         </div> 
                          </div>
                        <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
                       
                    </div>
                    <div class="modal-body header-top">
                        <h2 class="details">Appointment Details</h2>
                        <div class="detail-grid">
                          <div class="detail-grid-left">
                            <ul class="main-name">
                              <li>Customer Name</li>
                              <li>Services
                                <ul class="sub-name">
                                  <li>Hair Cutting</li>
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
                              <li>Criss</li>
                              <li>
                                <ul class="sub-name p-top">
                                  <li>€ 8.99</li>
                                  <li>€ 12.99</li>
                                  <li class="black">€ 25.98</li>
                                </ul>
                              </li>
                              <li>+56 545 216 7404</li>
                              <li>Robart55@xyz.com</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                     <div class="modal-footer center mian-popup">
                        <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Edit</button>
                        <button type="button" class="close-btn close close-button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

             <h3 class="heading dark-green">Sherlock</h3>
               <div class="otherPages" data-modal="modalfour">
          <div class="block1 h1_30 dark-green border show-modal">
            <div class="top">
              <h5>Alberto Torresi</h5>
              <p>Hair Cutting</p>
              <p>Beard Shaving</p>
            </div>
            <div class="bottom">
              <h6>Estd Time : 1:30 mint</h6>
            </div>
         </div> 
       </div>
          </div>



           <div class="grid-6  white">
            <div id="modalfive" class="modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-top">
                      <div class="top-header">
                        <img src="dist/img/pop-img.png">
                        <div class="pop-img-text">
                          <h3>Harry black</h3>
                          <h4>Harry Hair Saloon</h4>
                         </div> 
                          </div>
                        <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
                       
                    </div>
                    <div class="modal-body header-top">
                        <h2 class="details">Appointment Details</h2>
                        <div class="detail-grid">
                          <div class="detail-grid-left">
                            <ul class="main-name">
                              <li>Customer Name</li>
                              <li>Services
                                <ul class="sub-name">
                                  <li>Hair Cutting</li>
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
                              <li>Criss</li>
                              <li>
                                <ul class="sub-name p-top">
                                  <li>€ 10.99</li>
                                  <li>€ 15.99</li>
                                  <li class="black">€ 30.98</li>
                                </ul>
                              </li>
                              <li>+07 075 456 8964</li>
                              <li>Harry89@xyz.com</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                     <div class="modal-footer center mian-popup">
                        <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Edit</button>
                        <button type="button" class="close-btn close close-button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
                <h3 class="heading purple">Andrew</h3>
           <div class="otherPages" data-modal="modalfive">
          <div class="block1 h-2 purple  border show-modal">
            <div class="top">
              <h5>Alberto Torresi</h5>
              <p>Hair Cutting</p>
              <p>Beard Shaving</p>
            </div>
            <div class="bottom">
              <h6>Estd Time : 2 hour</h6>
            </div>
         </div> 
       </div>
           </div>

  </div>
   -->

@endsection
