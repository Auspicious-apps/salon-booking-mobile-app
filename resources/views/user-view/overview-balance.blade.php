@extends('layout-user.app')

@section('content')


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Balance</h1>
      </div> 
    </div>
        <div class="staff-main-block">
      <div class="metting-schedule overview balance-height">
    <!--    <div class="submit_section padding10">-->
    <!--    <div class="date">-->
    <!--      <form class="flex-box">-->
    <!--      <input type="date" id="calender" name="calender">-->
    <!--      <input type="date" id="calender" name="calender">-->
    <!--        <button class="search-btn">Search</button>-->
    <!--    </form>-->
    <!--  </div>-->
    <!--</div>  -->
    <div class="income-section-detail new-balance">
      <div class="income-block-main">
        <div class="income-block top">
          <div class="income-block-text">
            <h3>Ingreso total</h3>
            <h1>€  @if(!empty($get_totalincomeData)) {{ $get_totalincomeData }} @endif</h1>
          </div>
           <div class="income-block-img">
            <img src="{{ asset('public/overview_images/new_income.png') }}">
           </div>
        </div>
        <div class="income-block bottom">
          <div class="income-block-text">
            <h3>Egreso Total</h3>
            <h1>€ @if(!empty($get_totalexpensesData)) {{ $get_totalexpensesData }} @endif</h1>
          </div>
           <div class="income-block-img">
            <img src="{{ asset('public/overview_images/total-expense.png') }}">
           </div>
        </div>
        

      </div>
      <div class="income-block-right">
      <div class="total_income-detail"> 
          <img src="{{ asset('public/overview_images/new_balance.png') }}">
          <h4>Balance</h4>
    </div>
    <div class="amount">
       <h1>€ @if(!empty($getTotal_balance)) {{ $getTotal_balance }} @endif</h1>
      </div>
    </div>

  </div>
  
  <!--<div class="metting-schedule appointment-details balance-details">-->
  <!--      <table>-->
  <!--        <tr class="heading">-->
  <!--          <th>Appointment No.</th>-->
  <!--          <th>Name Of Customer</th>-->
  <!--          <th>Date & Time Of Appointment</th>-->
  <!--          <th>Appointed Hairdresser</th>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2250</td>-->
  <!--          <td>Cordell Hirthe </td>-->
  <!--          <td>11:30 AM on 22-04-2022</td>-->
  <!--          <td>Antonio Brown</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2251</td>-->
  <!--          <td>Clarabelle Leffler</td>-->
  <!--          <td>12:30 PM on 22-04-2022</td>-->
  <!--          <td>Carlee Schamberger</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2252</td>-->
  <!--          <td>Emelia Gleason</td>-->
  <!--          <td>14:00 PM on 22-04-2022</td>-->
  <!--          <td>Clifton Koss</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2253</td>-->
  <!--          <td>Antoinette O'Keefe</td>-->
  <!--          <td>16:30 PM on 22-04-2022</td>-->
  <!--          <td>Antonio Brown</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2254</td>-->
  <!--          <td>Viviane Leffler</td>-->
  <!--          <td>12:00 AM on 22-04-2022</td>-->
  <!--          <td>Mariana Muller</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2255</td>-->
  <!--          <td>Annetta Auer</td>-->
  <!--          <td>14:30 PM on 22-04-2022</td>-->
  <!--          <td>Clifton Koss</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2256</td>-->
  <!--          <td>Tristin Collier</td>-->
  <!--          <td>10:30 AM on 23-04-2022</td>-->
  <!--          <td>Antonio Brown</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2257</td>-->
  <!--          <td>Virginia Wehner</td>-->
  <!--          <td>11:30 AM on 23-04-2022</td>-->
  <!--          <td>Carlee Schamberger</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2258</td>-->
  <!--          <td>Nick Dicki</td>-->
  <!--          <td>12:00 PM on 23-04-2022</td>-->
  <!--          <td>Mariana Muller</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2259</td>-->
  <!--          <td>Brandon Buckridge</td>-->
  <!--          <td>12:30 PM on 23-04-2022</td>-->
  <!--          <td>Antonio Brown</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2260</td>-->
  <!--          <td>Cooper Mueller</td>-->
  <!--          <td>13:00 PM on 23-04-2022</td>-->
  <!--          <td>Charlie Klocko</td>-->
  <!--        </tr>-->
  <!--        <tr>-->
  <!--          <td>#2261</td>-->
  <!--          <td>Robbie Ratke</td>-->
  <!--          <td>14:30 PM on 23-04-2022</td>-->
  <!--          <td>Clifton Koss</td>-->
  <!--        </tr>-->
  <!--      </table> -->
  <!--    </div>-->
  </div>
</div>

 @endsection