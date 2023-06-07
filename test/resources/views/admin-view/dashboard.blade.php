@extends('layout-admin.app')

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


    <!-- /.content-header -->

    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->

@endsection
