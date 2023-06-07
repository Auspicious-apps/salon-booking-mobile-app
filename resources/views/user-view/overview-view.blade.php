@extends('layout-user.app')

@section('content')
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Descripción Géneral</h1>
      </div> 
    </div>

      <div class="metting-schedule overview">
        <div class="submit_section padding10">
        <div class="date">
      
  
           <input  class="calender date_ex" type="text" id="overview_startcustomerCalender" name="overview_startcustomerCalender" placeholder="dd-mm-yyyy">
    
          <input  class="calender date_ex" type="text" id="overview_endcustomerCalender" name="overview_endcustomerCalender" placeholder="dd-mm-yyyy">
          
    
          <button class="search-btn" id="filter_overviewCustomerData">Buscar</button>
      
       
      </div>
    </div>  
    <div class="income-section">
        <div class="total-earning">
          <div class="eraning-left">
            <h3>Saldo total este período </h3>  
            <h1>€ <span class="total_balance_period">@if(!empty($get_totalEarning))  {{ number_format((float)$get_totalEarning, 2, '.', '') }} @endif</span></h1>
            <div class="monthly-detail">
              <!--<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">-->
              <!--<circle cx="5.5" cy="5.5" r="5.5" fill="white"/>-->
              <!--<path d="M7.28571 7L5.5 5.125L3.71429 7L3 6.625L5.5 4L8 6.625L7.28571 7Z" fill="#59C5F3"/>-->
              <!--</svg>-->
              <!--<h5 class="m-0">+ € 550.56 (12.6%) (Last Month)</h5>-->
            </div>
          </div>
           <div class="eraning-right">
            <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.38641 64.9831C2.28508 64.9156 2.18375 64.848 2.08242 64.7974C1.27177 64.3583 0.84956 63.5138 1.03533 62.7032C1.238 61.825 1.9642 61.2339 2.90996 61.2001C3.55172 61.1832 4.21037 61.2001 4.91969 61.2001C4.91969 60.913 4.91969 60.6935 4.91969 60.4739C4.91969 56.4038 4.91969 52.3337 4.91969 48.2804C4.91969 46.7605 5.64589 46.0511 7.16586 46.0511C9.49647 46.0511 11.844 46.0511 14.1746 46.0511C15.5257 46.0511 16.2856 46.8111 16.2856 48.1622C16.2856 52.2492 16.2856 56.3362 16.2856 60.4233C16.2856 60.6597 16.2856 60.8792 16.2856 61.1664C17.5354 61.1664 18.7683 61.1664 20.0856 61.1664C20.0856 60.9299 20.0856 60.6935 20.0856 60.4401C20.0856 54.8838 20.0856 49.3106 20.0856 43.7543C20.0856 42.2006 20.7949 41.4912 22.3655 41.4912C24.6792 41.4912 26.993 41.4912 29.3236 41.4912C30.7084 41.4912 31.4515 42.2512 31.4684 43.653C31.4684 49.2431 31.4684 54.8163 31.4684 60.4064C31.4684 60.6597 31.4684 60.8961 31.4684 61.1832C32.735 61.1832 33.951 61.1832 35.2683 61.1832C35.2683 60.9468 35.2683 60.7104 35.2683 60.4739C35.2683 52.587 35.2683 44.717 35.2683 36.83C35.2683 35.2594 35.9776 34.5501 37.5314 34.5501C39.7775 34.5501 42.0406 34.5501 44.2868 34.5501C45.9418 34.5501 46.6343 35.2256 46.6343 36.8807C46.6343 44.717 46.6343 52.5532 46.6343 60.3895C46.6343 60.6428 46.6343 60.8961 46.6343 61.1832C47.9009 61.1832 49.1338 61.1832 50.4342 61.1832C50.4342 60.9299 50.4342 60.6766 50.4342 60.4401C50.4342 48.3649 50.4342 36.2896 50.4342 24.2312C50.4342 22.6268 51.1266 21.9175 52.731 21.9175C55.011 21.9175 57.274 21.9175 59.554 21.9175C61.0739 21.9175 61.8001 22.6437 61.8001 24.1468C61.8001 36.2389 61.8001 48.3311 61.8001 60.4233C61.8001 60.6766 61.8001 60.913 61.8001 61.2001C63.2863 61.3015 64.9414 60.7779 65.7183 62.6019C65.7183 62.9396 65.7183 63.2774 65.7183 63.6152C65.4143 64.2401 64.9583 64.696 64.3334 65C43.6788 64.9831 23.0242 64.9831 2.38641 64.9831Z" fill="white"/>
<path d="M65.7182 14.1487C65.0089 15.6349 63.7592 16.0571 62.6614 15.1283C62.3237 14.8581 62.0703 14.4021 61.9521 13.9799C61.3779 11.987 60.8544 9.96039 60.3139 7.95066C60.2633 7.79866 60.2126 7.64667 60.1619 7.47778C59.0811 9.04841 58.0846 10.6359 56.9531 12.1221C48.5933 23.1334 37.9029 31.1217 25.169 36.3909C20.2037 38.4344 15.0528 39.853 9.73288 40.5117C7.50359 40.7819 5.24054 40.8495 2.99437 40.9508C1.82906 41.0183 1.00152 40.1908 0.984634 39.1268C0.967746 38.0797 1.77839 37.2522 2.90992 37.2015C4.02456 37.1509 5.1392 37.1509 6.25385 37.0664C11.9959 36.678 17.5185 35.3438 22.8552 33.2327C34.9305 28.4533 45.1143 21.0561 53.1701 10.8386C54.555 9.08219 55.754 7.17379 57.0545 5.33294C57.0038 5.28228 56.97 5.21472 56.9193 5.16406C56.6322 5.23161 56.3451 5.28228 56.058 5.36672C53.9639 5.92404 51.8866 6.49825 49.7755 7.05557C48.34 7.42712 47.1409 6.49825 47.2422 5.11339C47.2929 4.31963 47.8333 3.66098 48.644 3.44143C52.4946 2.39434 56.362 1.36415 60.2295 0.350836C61.3103 0.0637316 62.2561 0.654829 62.5601 1.82014C63.489 5.2485 64.4009 8.67687 65.3298 12.1221C65.4311 12.5274 65.5831 12.9159 65.7014 13.3043C65.7183 13.5576 65.7182 13.8616 65.7182 14.1487Z" fill="white"/>
</svg>

           </div>

    </div> 
    <div class="earning-list">  
      <a href="{{ url('get-overview-income') }}">  
      <img src="{{ asset('public/overview_images/income.png') }}">
      <h3>Ingreso</h3>
    </a>
    </div>
    <div class="earning-list">
      <a href="{{ url('get-overview-expenses') }}"> 
      <img src="{{ asset('public/overview_images/expenses.png') }}">
      <h3>Egreso</h3>
    </a>
    </div>
    <div class="earning-list">
      <a href="{{ url('get-overview-balance') }}"> 
      <img src="{{ asset('public/overview_images/balance.png') }}">
      <h3>Equilibrio</h3>
    </a>
    </div>
      </div>
       <div class="main-outer-table">
       <img src="{{ asset('public/overview_images/output-onlinegiftools.gif') }}" id="loading-image" style="display:none;"/>
      <div class="metting-schedule appointment-details">
        <table>
            <tbody class="test">
              <tr class="heading">
                <th>No. De cita</th>
                <th>Nombre del cliente</th>
                <th>Fecha y hora de la cita</th>
                <th>Peluquero elegido</th>
              </tr>
                

                @if(!empty($result))
                <?php $counter =1; ?>
              <?php   $i = ($result->perPage() * ($result->currentPage() - 1)) + 1;?> 
                @foreach($result as $index => $data) 

                    @if(empty($data->customer_id))

                     <?php $get_staff = App\Staff::where('id',$data->staff_id)->first(); ?>

                  <tr>
                      <td>  <?php echo $i; ?>  </td> 
                      <td> @if(!empty($data->first_name)) {{ $data->first_name }} @else @endif  @if(!empty($data->last_name)) {{ $data->last_name }} @else @endif </td>
                      <td> @if(!empty($data->date)) {{ $data->date }} @else @endif on @if(!empty($data->start_time)) {{ $data->start_time }} @else @endif </td>
                      <td> @if(!empty($get_staff->first_name)) {{ $get_staff->first_name }} @else @endif  @if(!empty($get_staff->last_name)) {{ $get_staff->last_name }} @else @endif </td>
                      

                  </tr>

                  @else

                   <?php  $customer_data = App\User::where('id',$data->customer_id)->first();  ?> 
                    <?php $get_staff = App\Staff::where('id',$data->staff_id)->first(); ?>
                  <tr>
                      <td> <?php  echo $i; ?>  </td> 
                      <td> @if(!empty($customer_data->first_name)) {{ $customer_data->first_name }} @else @endif  @if(!empty($customer_data->last_name)) {{ $customer_data->last_name }} @else @endif </td>

                       <td> @if(!empty($data->date)) {{ $data->date }} @else @endif on @if(!empty($data->start_time)) {{ $data->start_time }} @else @endif </td>
                       <td> @if(!empty($get_staff->first_name)) {{ $get_staff->first_name }} @else @endif  @if(!empty($get_staff->last_name)) {{ $get_staff->last_name }} @else @endif </td>
                  </tr>

                  @endif

                  <?php $counter++; ?>
                  <?php $i++; ?>
                @endforeach
                @endif

              
          </tbody>
         
        </table> 
         {{ $result->links() }}

        
      </div>
      
      </div>
      
  </div>
  </div>


 <!-- <script>
  $(function() {
    $( "#date_ex" ).datepicker({
            inline: true,  
            showOtherMonths: true,  
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            dateFormat: "DD, dd MM yy",
            showAnim: "blind"
    });
  });
  </script> -->
  <!-- /.content-wrapper -->
  @endsection