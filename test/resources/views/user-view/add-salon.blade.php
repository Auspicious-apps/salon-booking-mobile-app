@extends('layout-user.app')

@section('content')

    @if ($message = Session::get('salon_status'))    
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif
        
        
        
        <style>
        .information-block {
        display: flex;
        }
        .staff-right-block {
        width: 60%;
        }
        .information-left {
        width: 40%;
        }
        .upload__img-box img {
        display: block;
        width: 100%;
        }
        .information-left .myfrm.form-control {
        margin-bottom: 10px;
        }
.test .coll {
    display: flex;
    align-items: center;
    margin-right: 20px;
    padding: 10px;
    margin-bottom: 0;
}
.test {
    background: #FFFFFF;
    border: 1px solid #EEEEEE;
    margin-bottom: 10px;
}
.test h3 {
    padding: 10px 10px 0 10px;
    font-size: 16px;
    margin-bottom: 0;
    font-weight: 700;
}
.inner-column-salon {
    min-height: 60px;
    overflow: auto;
    display: grid;
    max-height: 95px;
    grid-template-columns: 1fr 1fr 1fr;
    padding: 0;
}
.test .coll input {
    width: auto;
}
.test .coll  h2 {
    font-size: 16px;
    margin-bottom: 0;
    padding-left: 10px;
}





        </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Salon & Spa</h1>
      </div> 
    </div>
        <div class="staff-main-block">
          <div class="metting-schedule overview marketing-height">
          <section class="filters">
           <!--  <ul class="filters-content account nav-pad">
              <button class="filters__button is-active" data-target="#salon">
                Salon Information
              </button>
              
              <button class="filters__button" data-target="#treatments">
                My Treatments
              </button>
             
            </ul> -->

            <div>
    <form class="form-right-side" action="{{ url('send-salonData') }}" method="POST" enctype="multipart/form-data">
     @csrf
        <input type="hidden" name="saloon_update_id" value="{{ $editSaloon->id }}">
   <div data-content class="is-active" id="salon">
                <div class="information-block">
                  <div class="information-left">
                      
                      
                 
                        
                    <div class="upload__box">
                      <div class="upload__img-wrap">
                           <?php if(!empty($editSalonUserDetails->image)) {
                                    $test = $editSalonUserDetails->image;
                                        $obj =  explode(",",$test);
                                            
                            for($i=0;$i<count($obj);$i++) {
                            ?>  
                                <div class="upload__img-box">
                                <span><input type="hidden" class="remove_image_icon_test" name="old_saloonImage[]" id="old_saloonImage" value="<?php  echo $obj[$i];  ?>"><i class="fa fa-times remove_image_icon" aria-hidden="true"></i><img src="{{asset('public/salon_images/saloon_imagesAll/' .$obj[$i])}}"></span>
                                     
                                </div>
                                
                               <?php } }  ?>
                      </div>
					  
                      <div class="upload__btn-box">
                        <label class="upload__btn">
                          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 4C22.6 4 28 9.4 28 16C28 22.6 22.6 28 16 28C9.4 28 4 22.6 4 16C4 9.4 9.4 4 16 4ZM16 2C8.3 2 2 8.3 2 16C2 23.7 8.3 30 16 30C23.7 30 30 23.7 30 16C30 8.3 23.7 2 16 2Z" fill="black"/>
                            <path d="M24 15H17V8H15V15H8V17H15V24H17V17H24V15Z" fill="black"/>
                            </svg>
                          <input type="file" data-max_length="2" class="upload__inputfile" name="salon_image_upload[]" onchange="readURL(this);" accept="image/*" multiple>
                        </label>
                      </div>
                    </div>
                    </div>
                
					
					 <div class="staff-right-block">
         
            <h4>Description</h4>
            <div class="coll">
              <input type="text" id="description" name="description" value="@if(!empty($editSalonUserDetails->description)) {{ $editSalonUserDetails->description }}  @endif"  placeholder="Description">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
          
            <h4>Basic Information</h4>
            <div class="coll"> 
              <input type="text" id="salon_name" name="salon_name"  placeholder="Salon Name" value="@if(!empty($editSaloon->saloon_name))   {{ $editSaloon->saloon_name }}  @endif">
               @error('salon_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            @if(!empty($get_salon_types))
            <div class="test">
              <h3>Please Select Salon Types</h3>
               <div class="inner-column-salon">
            @foreach($get_salon_types as $data) 
            
               <?php  
                        if(!empty($editSalonUserDetails->salon_type)) {
                            $edit_salonType = explode(',',$editSalonUserDetails->salon_type); 
                        }           
               ?>
                
            <div class="coll">
                <input type="checkbox" name="ALLsalon_type[]" id="salon_type" value="{{ $data->id }}" @if(!empty($edit_salonType))  {{ $data->id==in_array($data->id,$edit_salonType)? 'checked':'' }} @endif	>  <h2 class="heading">{{ $data->title }}</h2>
            </div>
            
            @endforeach
             </div>
            </div>
            @endif
            
            <div class="coll">
              <input type="text" id="city" name="city" placeholder="City" value="@if(!empty($editSalonUserDetails->city))   {{ $editSalonUserDetails->city }}  @endif">
               @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>         
            <div class="coll">
              <input type="text" id="address" name="address" placeholder="Street Address" value="@if(!empty($editSalonUserDetails->address)) {{ $editSalonUserDetails->address }}  @endif">
               @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="coll">
              <input type="text" id="zipcode" name="zipcode" placeholder="Zip/Postal Code" value="@if(!empty($editSalonUserDetails->zipcode))   {{ $editSalonUserDetails->zipcode }}  @endif">
              @error('zipcode')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
             <div class="open-close">
            <div class="coll">
              <!-- <input type="time" id="opentiming" value="Open Timings"> -->
              <label>Opening Timing</label>
               <input type="time" id="opentiming" name="opening_time"  placeholder="Open Timings" required="required"  value="<?php  if(!empty($editSalonUserDetails->opening_timing)) { echo $editSalonUserDetails->opening_timing; }  ?>"/>
               
                 @error('opening_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
              <div class="coll">
                <label>Closing Timing</label>
                         
              <input type="time" id="closetiming"  placeholder="Close Timings" name="closing_time" required="required" value ="<?php  if(!empty($editSalonUserDetails->closing_timing)) { echo $editSalonUserDetails->closing_timing; }  ?>"/>
               @error('closing_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
                <label>Week Days</label>
                
                  <?php  
                           
                        if(!empty($editSalonUserDetails->week_day)) {
                            $edit_weekendDays = explode(',',$editSalonUserDetails->week_day);
                        }  
                    ?>
                
                 <div class="coll">
                     <div class="inner-column-salon test fixed">
                   <div class="coll"><input type="checkbox" name="weekendSaloon[]" id="weekendSaloon" value="Sunday"@if(!empty($edit_weekendDays))  {{ "Sunday"==in_array("Sunday",$edit_weekendDays)? 'checked':'' }} @endif> <h2 class="heading">Sunday</h2>  </div>
                     <div class="coll"><input type="checkbox" name="weekendSaloon[]" id="weekendSaloon" value="Monday" @if(!empty($edit_weekendDays))  {{ "Monday"==in_array("Monday",$edit_weekendDays)? 'checked':'' }} @endif><h2 class="heading">Monday</h2>  </div>
                     <div class="coll"> <input type="checkbox" name="weekendSaloon[]" id="weekendSaloon" value="Tuesday" @if(!empty($edit_weekendDays))  {{ "Tuesday"==in_array("Tuesday",$edit_weekendDays)? 'checked':'' }} @endif><h2 class="heading">Tuesday</h2> </div>
                     <div class="coll"> <input type="checkbox" name="weekendSaloon[]" id="weekendSaloon" value="Wednesday" @if(!empty($edit_weekendDays))  {{ "Wednesday"==in_array("Wednesday",$edit_weekendDays)? 'checked':'' }} @endif><h2 class="heading">Wednesday</h2> </div>
                    <div class="coll"> <input type="checkbox" name="weekendSaloon[]" id="weekendSaloon" value="Thursday" @if(!empty($edit_weekendDays))  {{ "Thursday"==in_array("Thursday",$edit_weekendDays)? 'checked':'' }} @endif><h2 class="heading">Thursday</h2>  </div>
                    <div class="coll"> <input type="checkbox" name="weekendSaloon[]" id="weekendSaloon" value="Friday" @if(!empty($edit_weekendDays))  {{ "Friday"==in_array("Friday",$edit_weekendDays)? 'checked':'' }} @endif><h2 class="heading">Friday</h2>  </div>
                    <div class="coll"> <input type="checkbox" name="weekendSaloon[]" id="weekendSaloon" value="Saturday"@if(!empty($edit_weekendDays))  {{ "Saturday"==in_array("Saturday",$edit_weekendDays)? 'checked':'' }} @endif> <h2 class="heading">Saturday</h2> </div>
                    </div>
                </div>
                
                
                 <div class="coll">
              <input type="text" id="latitude" name="latitude"  placeholder="Enter Latitude" value ="@if(!empty($editSalonUserDetails->latitude )) {{ $editSalonUserDetails->latitude  }}  @endif">
               @error('latitude')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
             <div class="coll">
              <input type="text" id="longitude" name="longitude"  placeholder="Enter longitude" value ="@if(!empty($editSalonUserDetails->longitude  )) {{ $editSalonUserDetails->longitude  }}  @endif">
               @error('longitude')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
 
            <!--    @error('closing_time')-->
            <!--    <div class="alert alert-danger">{{ $message }}</div>-->
            <!--@enderror-->
            </div>
            </div>
        
           
            <h4>Profile Information</h4>
            <div class="coll">
              <input type="text" id="email" name="email"  placeholder="Email Address" value ="@if(!empty($editSaloon->email)) {{ $editSaloon->email }}  @endif">
               @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="coll">
              <input type="text" id="phone" name="phone"  placeholder="Phone Number" value ="@if(!empty($editSaloon->phone)) {{ $editSaloon->phone }}  @endif">
               @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            

               <div class="coll">
                 <input type="submit" name="add_salonButton" value="submit">
               </div>
            </form>
            
          </div>
		  
                </div>
              
                </div>
            </div>
            
         


@endsection