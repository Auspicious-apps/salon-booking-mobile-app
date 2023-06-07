@extends('layout-user.app')

@section('content')

<style>
    
    .image-upload-wrap-edit {
            
            display: none;
        
    }
</style>
<div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Edit Staff Member </h1>
      </div> 
    </div>
                                        
 <form class="form-right-side staffSubmit" action="{{ url('update-staff/'.$edit_staffDetails->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
@csrf

    <div class="staff-main-block">
      <div class="metting-schedule add-staff-grid">
        <div class="staff-left-block">
          <div class="left-top">
             <!-- <img src="dist/img/staff-img.png">
             <section class="uplaod">
                 <input type="file" id="file" />
                  <label for="file" class="btn-1">upload file</label>
              </section> -->
              <div class="file-upload">
                <div class="image-upload-wrap-edit">
                  <input class="file-upload-input" value="{{ $edit_staffDetails->image }}" name="staff_image_upload" type='file' onchange="readURL(this);" accept="image/*"/>
                      @error('staff_image_upload')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  <div class="drag-text">
                    <h3>Upload Image</h3>
                  </div>
                </div>
                <div class="file-upload-content-edit">
                    <input type="hidden" name ="old_staff_image_upload"  value="{{ $edit_staffDetails->image }}">
                  <img class="file-upload-image" name="staff_image_upload" src="{{ asset('public/staff_images/'.$edit_staffDetails->image) }}" alt="your image" />
                  
                </div>
                <div class="upload-img">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )"> Choose Image</button>
                </div>
              </div>

              <div class="color-picker">
               <h4> Assign a Color</h4>                           
              <input type="color" id="favcolor" name="staff_avcolor" value="{{ $edit_staffDetails->color }}">
            </div>
           </div> 
          
        <div class="left-bottom">
       
            <div class="service-list">
                <h5>Services Provided</h5>
                        
              <div class="form-group-list">
                     
                  @foreach($get_singlestaffService as $data)
                        
                        <?php  
                                    
                            $checkServiceProvidedArray = explode(',',$edit_staffDetails->services_provided);
                           
                            ?>
                        
                    
                   <div class="form-group">    
                    <input type="checkbox" id="{{ $data->identifier }}" class="test" name="staff_service[]" value="{{ $data->identifier }}" {{ $data->identifier==in_array($data->identifier,$checkServiceProvidedArray)? 'checked':'' }}>
                    <label for="{{ $data->identifier }}">{{ $data->title }}</label>
                  </div>
            
                  @endforeach
             
             </div>
         </div>
         
        </div>
        
        </div>
        <div class="staff-right-block">
            
            <h4>Personal Information</h4>
            <div class="coll"> 
              <input type="text" id="description" name="description" value="{{ $edit_staffDetails->description }}" placeholder="Description">
               @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    
            <h4>Personal Information</h4>
            <div class="coll">
              <input type="text" id="first_name" name="first_name" value="{{ $edit_staffDetails->first_name }}" placeholder="First Name">
            @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="coll">
              <input type="text" id="last_name" name="last_name" value="{{ $edit_staffDetails->last_name }}" placeholder="Last Name">
            @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>  
                
                    
             <div class="coll">                         
             
              <input placeholder="Date of Birth"  value="{{ date('d-m-Y', strtotime($edit_staffDetails->date_of_birth)) }}" name="dob" class="textbox-n" type="text" onfocus="(this.type='date')" id="date">
               @error('dob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div> 
            
            <div class="coll col-flex">
                <p>Gender</p>
            <input type="radio" id="male" name="gender" value="male" {{($edit_staffDetails->gender == 'male') ? 'checked' : ''}}>Male
            <input type="radio" id="female" name="gender" value="female" {{($edit_staffDetails->gender == 'female') ? 'checked' : ''}}>Female
            </div>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            
            <div class="coll">
                <input type="text"  value="{{ $edit_staffDetails->position }}" id="position" name="position" placeholder="position">
                  @error('position')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            
            
            <h4>Contact Information</h4>
            <div class="coll">
              <input type="text" id="contact_number"  value="{{ $edit_staffDetails->contact_number }}" name="contact_number" placeholder="Contact Number">
            @error('contact_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="coll">
              <input type="text" id="email_address"  value="{{ $edit_staffDetails->email }}" name="email_address"  placeholder="Email Address">
            @error('email_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>         
            <div class="coll">
              <input type="text" id="home_address"  value="{{ $edit_staffDetails->street_address }}"  name="home_address" placeholder="Home Address">
               @error('home_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
           
            
            
             <div class="coll">
              <input type="text" id="city"  value="{{ $edit_staffDetails->city }}"  name="city" placeholder="City">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
         
            <div class="coll">
              <input type="text" id="state"  value="{{ $edit_staffDetails->state }}"  name="state" placeholder="State">
                @error('state')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
             <div class="coll">
              <input type="text" id="country"  value="{{ $edit_staffDetails->country }}"  name="country" placeholder="country">
                @error('country')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
           
          <fieldset>
            <legend>Billing Information</legend>
            <!--<div class="coll">-->
            <!--  <input type="text" value="{{ $edit_staffDetails->hourly_rate }}" id="hourly_rate" name="hourly_rate" placeholder="Hourly Rate">-->
            <!--    @error('hourly_rate')-->
            <!--    <div class="alert alert-danger">{{ $message }}</div>-->
            <!--@enderror-->
            <!--</div>-->
            
            <h4>Add a Vacation</h4>
            <div class="col-add-main">
                
                       <div class="coll">
                 <h6>From</h6>
                 <input placeholder="From"  value="{{ $edit_staffDetails->vacation_from }}" class="textbox-n" type="text"  name="vacationStaf_from" onfocus="(this.type='date')" id="from">
                    @error('vacationStaf_from')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                   <div class="coll">
                    <h6>To</h6>
                 <input placeholder="To"  value="{{ $edit_staffDetails->vacation_to }}" class="textbox-n" type="text"  name="vacationStaff_To" onfocus="(this.type='date')" id="to">
                    @error('vacationStaff_To')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                </div>
                </fieldset>
                
               
               <div class="coll">
                 <input type="submit" name="update_staffButton" id="handleAjax" value="Update">
               </div>
            </div>
      
            
        </div>
      
     </form>
</div>



<script>


        // function validate()
        // {

        //  if ($('.test').filter(':checked').length < 1){
        //         alert("Please Check at least one Service Provided");
        //          return false;
        //  }else{
        //       return true;
        //  }
    
    
        // }
</script>
@endsection