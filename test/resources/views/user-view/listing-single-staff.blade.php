@extends('layout-user.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Staff</h1>
      </div> 
    </div>
    <div class="staff-main-block">
      <div class="metting-schedule add-staff-grid">
        <div class="staff-left-block">
          <div class="left-top">
              <div class="file-upload">
                <div class="file-upload-content-single">   
                  <img class="single-file-upload-image" src="{{ asset('public/staff_images/'.$Single_staffDetails->image) }}" alt="your image" />
                </div>
              </div>
          </div> 
                
                
          <div class="left-bottom height-bottom p-new">
            <h5>Services Provided</h5>
            <div class="service-list">
                
              <div class="form-group-list check-unset">
                  
                  <?php 
                       if(!empty($Single_staffDetails->services_provided)) {
                        $obj  = explode(',',$Single_staffDetails->services_provided);
                      
                    
                  for($i=0;$i<count($obj);$i++) { ?>
                  <div class="form-group">
                    <input type="checkbox" id="check1">
                    <label for="check1"><?php  echo str_replace('_', ' ', $obj[$i]);?></label>
                  </div>
                  <?php  } } ?>
                               
               </div>
             </div>
         </div>
        </div>
        <div class="individual-staff-right-block">
          <div class="staff-detail-heading">
            <h1 class="m-0">{{ $Single_staffDetails->first_name}} {{ $Single_staffDetails->last_name}}</h1>
            <div class="edit-btn">  
                                
                                
                 <a href="{{ url('edit-staff',$Single_staffDetails->id) }}">Edit</a>
                 <a class="delete" href="#" edit-id="{{ $Single_staffDetails->id }}">Delete</a>
            </div>
          </div>
          <div class="staff-location">
                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7 9.25C8.24264 9.25 9.25 8.24264 9.25 7C9.25 5.75736 8.24264 4.75 7 4.75C5.75736 4.75 4.75 5.75736 4.75 7C4.75 8.24264 5.75736 9.25 7 9.25Z" stroke="#59C5F3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M7 1C5.4087 1 3.88258 1.63214 2.75736 2.75736C1.63214 3.88258 1 5.4087 1 7C1 8.419 1.3015 9.3475 2.125 10.375L7 16L11.875 10.375C12.6985 9.3475 13 8.419 13 7C13 5.4087 12.3679 3.88258 11.2426 2.75736C10.1174 1.63214 8.5913 1 7 1V1Z" stroke="#59C5F3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <h5 class="location-name m-0">
          {{ $Single_staffDetails->state}}, {{ $Single_staffDetails->country }}
        </h5>
         </div>  
         <div class="staff-details-content" >
        <p slass="staff-content">{{ $Single_staffDetails->description }}</p>
        <ul class="user-details p-left0">
          <li><h3>Date of Birth</h3><h3>{{ $Single_staffDetails->date_of_birth }}</h3></li>
          <li><h3>Position</h3><h3>{{ $Single_staffDetails->position }}</h3></li>
        </ul>
        </div>
        </div>
      </div>
      </div>
    </div>
    




    @endsection