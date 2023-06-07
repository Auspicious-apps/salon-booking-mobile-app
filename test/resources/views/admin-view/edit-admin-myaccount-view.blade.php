@extends('layout-admin.app')

@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Edit Admin Account</h1>
      </div> 
    </div>
     
       <form  class="form-right-side" name="edit-account-details" id="edit-account-details" method="post" action="{{ url('edit-adminAccountDetails') }}"  enctype="multipart/form-data"> 
       @csrf
        <div class="staff-main-block">
          <div class="metting-schedule overview marketing-height information-block">
          <div class="staff-left-block ">
          <div class="left-top">
             <!-- <img src="dist/img/staff-img.png">
             <section class="uplaod">
                 <input type="file" id="file" />
                  <label for="file" class="btn-1">upload file</label>
              </section> -->
              <div class="file-upload">
                <div class="image-upload-wrap">
                    
                  <input class="file-upload-input" name="edit_adminImage" type="file" onchange="readURL(this);" accept="image/*">
                  
                  <img class="file-upload-image" src="{{asset('public/admin_images/' . $editgetAdmin_Data->image) }}" alt="your image">
                  <input type="hidden" class="old_adminEdit_image" name="old_adminEdit_image" value="@if(!empty($editgetAdmin_Data->image)) {{ $editgetAdmin_Data->image }} @endif">
                  <!--<div class="drag-text">-->
                  <!--  <h3>Upload Image</h3>-->
                  <!--</div>-->
                </div>
                <div class="file-upload-content">
                  <img class="file-upload-image" src="#" alt="your image">
                </div>
                
                <div class="upload-img">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Choose Image</button>
                </div>
              </div>
          </div> 
        </div>
    
    
        <div class="staff-right-block">
       
            <h4>Basic Information</h4>
            <div class="coll">
              <input type="text" id="first name" name="first_name" placeholder="Name" value="@if(!empty($editgetAdmin_Data->first_name)) {{ $editgetAdmin_Data->first_name }} @endif">
            </div>
            <div class="coll">
              <input type="text" id="last name" name="last_name" placeholder="Name" value="@if(!empty($editgetAdmin_Data->last_name)) {{ $editgetAdmin_Data->last_name }} @endif">
            </div>
            <div class="coll">
              <input type="text" id="first name" name="city" placeholder="City" value="@if(!empty($editgetAdmin_Data->city)) {{ $editgetAdmin_Data->city }} @endif">
            </div>
            <div class="coll">
              <input type="text" id="state" name="state" placeholder="state" value="@if(!empty($editgetAdmin_Data->state)) {{ $editgetAdmin_Data->state }} @endif">
            </div>
             <div class="coll">
              <input type="text" id="first name" name="street_address" placeholder="Street Address" value="@if(!empty($editgetAdmin_Data->street_address)) {{ $editgetAdmin_Data->street_address }} @endif">
            </div>
                  <div class="coll">
            <input type="text" id="text" placeholder="Zip/Postal Code"  name="pincode" maxlength="6" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" value="@if(!empty($editgetAdmin_Data->zipcode)) {{ $editgetAdmin_Data->zipcode }} @endif">
            </div>
         
         
            <h4>Personal Information</h4>
            <div class="coll">
                <input type="text" id="first name" name="username" placeholder="Username" value="@if(!empty($editgetAdmin_Data->user_name)) {{ $editgetAdmin_Data->user_name }} @endif">
            </div>
            <div class="coll">
                <input type="tel" id="last name" name="phone" placeholder="Phone Number" value="@if(!empty($editgetAdmin_Data->phone)) {{ $editgetAdmin_Data->phone }} @endif">
            </div>   
         
         
         
    
               <div class="coll">
                 <input type="submit" value="submit" name="submit">
               </div>
            </div>

        </div>
    </div>
    </form>
    
    
  </div>
    @endsection