@extends('layout-user.app')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Expenses</h1>
      </div> 
    </div>
        <div class="staff-main-block">
      <div class="metting-schedule overview overview-height">
        <div class="submit_section padding10">
        <div class="date">
          <form class="flex-box">
          <input type="date" id="calender" name="calender" class="expenses_Start_calenderDate calender">
          <input type="date" id="calender" name="calender" class="expenses_End_calenderDate calender">
            <button class="search-btn" id="expenses_search" type="button">Search</button>
        </form>
      </div>
    </div>  
    <div class="income-section-detail">
      <div class="income-details">
         <div class="otherPages" data-modal="modaltwo">
        <div class="appoinment right ">
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
                       <input type="date" id="calender" name="expenses_calender" class="expenses_calender">
                     </div>
                      <div class="category-form">
                         <form>
                          <div class="coll column single-block select-item">
                          <select name="position" id="position" form="Position" class="expenses_Position">
                              <option value="">Select any option</option>
                            <option value="rent">Rent</option>
                            <option value="appointments">Staff</option>
                            <option value="products">Products</option>
                            <option value="others">Others</option>
                          </select>
                        </div>
                          <input type="text" class="right" placeholder="Amount" name="expenses_amount" id="expenses_amount">
                        </form>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="update-btn  add_expenses" data-dismiss="modal" aria-hidden="true">Add</button>
                                        <!--   <button type="button" class="close-btn close close-button">Cancel</button> -->
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>

                <img src="{{ asset('public/overview_images/output-onlinegiftools.gif') }}" id="loading-image" style="display:none"/>
            <div class="incm-amnt">
              <ul class="filter-expenses">
                 <li class="heading"><span>Expense</span><span>Amount</span></li>
                 <li><span>Rent</span><span> € @if(!empty($get_expensesamountData) ){{ number_format($get_expensesamountData,2) }} @endif </span></li>
                 <li><span>Products</span><span>€ @if(!empty($get_expensesproductsData) ){{ number_format($get_expensesproductsData,2) }} @endif</span></li> 
                 <li><span>Others</span><span>€ @if(!empty($get_expensesothersData) ){{ number_format($get_expensesothersData,2) }} @endif</span></li>
                 <li><span>Appointments</span><span>€ @if(!empty($get_expensesappointmentsData) ){{ number_format($get_expensesappointmentsData,2) }} @endif</span></li>
               </ul>  

        </div>
      </div>
      <div class="income-block-right">
      <div class="total_income-detail"> 
          <img src="{{ asset('public/overview_images/new-expenses.png') }}">
          <h4 class="filter-total-expense">Total Expense</h4>
    </div>
    <div class="amount">
       <h1 id="filter-total-expense">€ @if(!empty($get_expensestotalsData) ){{ number_format($get_expensestotalsData,2) }} @endif</h1>
      </div>
    </div>

  </div>
  </div>
</div>

 @endsection