@extends('layout-user.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Income</h1>
      </div> 
    </div>
        <div class="staff-main-block">
      <div class="metting-schedule overview overview-height">
        <div class="submit_section padding10">
        <div class="date">
        
          <input type="date" id="calender" name="calender" class="income_Start_calenderDate calender">
          <input type="date" id="calender" name="calender" class="income_End_calenderDate calender">
            <button id="income_search" class="search-btn">Search</button>
       
      </div>
    </div>  
    <div class="income-section-detail">
      <div class="income-details">
         <div class="otherPages" data-modal="modaltwo">
        <div class="appoinment right">
        <a href="#">Add New<img src="dist/img/plus.png"></a>

        </div>
      </div>

       <div id="modaltwo" class="modal" style="display: none;">
            <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                      <div class="popup-category">
                        <h3>Add New</h3>
                       <button type="button" class="close close-button" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="select_date">
                       <input type="date" id="calender" name="income_calender" class="income_calender">
                     </div>
                      <div class="category-form">
                        <form>
                          <div class="coll column single-block select-item">
                          <select name="position" id="position" class="income_Position" form="Position">
                            <option value="">Select any option</option>
                            <option value="appointments">Appointments</option>
                            <option value="products">Products</option>
                            <option value="others">Others</option>
                          </select>
                        </div>
                          <input type="text" id="income_amount" class="right" placeholder="Amount">
                        </form>
                        
                      </div>
                      <div class="modal-footer center category-pop">
                        <button type="button" class="update-btn add_income" data-dismiss="modal" aria-hidden="true">Add</button>
                               <!--            <button type="button" class="close-btn close close-button">Cancel</button> -->
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
        <img src="{{ asset('public/overview_images/output-onlinegiftools.gif') }}" id="loading-image" style="display:none"/>
        <div class="incm-amnt">
          <ul class="filter-income">
            <li class="heading"><span>Income</span><span>Amount</span></li>
            <li><span>Appointments</span><span>€ @if(!empty($get_incomeappointmentsData) ){{ number_format($get_incomeappointmentsData,2) }} @endif</span></li>
             <li><span>Products</span><span>€ @if(!empty($get_incomeproductsData) ){{ number_format($get_incomeproductsData,2) }} @endif</span></li> 
             <li><span>Others</span><span>€ @if(!empty($get_incomeothersData) ){{ number_format($get_incomeothersData,2) }} @endif</span></li>
           </ul>  

        </div>
      </div>
      <div class="income-block-right">
      <div class="total_income-detail">  
          <img src="{{ asset('public/overview_images/total-income.png') }}">
          <h4>Total Income</h4>
    </div>
    <div class="amount">
       <h1>€ @if(!empty($get_incometotalsData) ){{ number_format($get_incometotalsData,2) }} @endif</h1>
      </div>
    </div>

  </div>
  </div>
</div>


 @endsection