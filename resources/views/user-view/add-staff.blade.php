@extends('layout-user.app')

@section('content')

<div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Añadir empleado</h1>
      </div> 
    </div>
    
 <form class="form-right-side staffSubmit" action="{{ url('send-staff') }}" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
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
                <div class="image-upload-wrap">
                  <input class="file-upload-input" name="staff_image_upload" type='file' onchange="readURL(this);" accept="image/*"/>
                      @error('staff_image_upload')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  <div class="drag-text">
                    <h3>Subir Foto</h3>
                  </div>
                </div>
                <div class="file-upload-content">
                  <img class="file-upload-image" name="staff_image_upload" src="#" alt="your image" value="{{old('staff_image_upload')}}" />
                  
                </div>
                <div class="upload-img">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )"> Elige Foto</button>
                </div>
              </div>

              <div class="color-picker">
               <h4> Elige un color</h4>
              <input type="color" id="colorpicker_value" class="test" name="staff_avcolor" value="">
              <input type="hidden" id="test" name="get_staff_avcolor" value="">
            </div>
           </div> 
          
      <!--   <div class="left-bottom">
       
            <div class="service-list">
                     <h5>Services Provided</h5>
              <div class="form-group-list">
                  <?php if(!empty($getStaff_Service)) { ?>
                @foreach($getStaff_Service as $data)   
                  <div class="form-group">    
                    <input type="checkbox" id="{{ $data->identifier }}" class="test" name="staff_service[]" value="{{ $data->identifier }}"{{ (is_array(old('staff_service')) && in_array( $data->identifier, old('staff_service'))) ? ' checked' : '' }}>
                    <label for="{{ $data->identifier }}">{{ $data->title }}</label>
                  </div>
                @endforeach
                
                <?php  } ?>
                 
               </div>
             </div>
         </div> -->
        </div>
        
        <div class="staff-right-block">
            
            <h4>Información Personal </h4>
            <div class="coll"> 
              <input type="text" id="description" name="description" value="{{old('description')}}" placeholder="Description">
               @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    
            <h4>Información Personal</h4>
            <div class="coll">
              <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" placeholder="Nombre ">
            @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="coll">
              <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Apellidos">
            @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>  
            
             <div class="coll">
              <input placeholder="Fecha de nacimiento "  value="{{old('dob')}}" name="dob" class="textbox-n" type="text" onfocus="(this.type='date')" id="date">
               @error('dob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div> 
            
            <!-- <div class="coll col-flex">
                <p>Gender:</p>
                <input type="radio" id="male" name="gender" value="male" {{(old('gender') == 'male') ? 'checked' : ''}}>Male
                <input type="radio" id="female" name="gender" value="female" {{(old('gender') == 'female') ? 'checked' : ''}}>Female
           
            </div>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror -->
            
            
            <div class="coll">
                <input type="text"  value="{{ old('position') }}" id="position" name="position" placeholder="Funcion">
                  @error('position')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            
            
            <h4>Detalles de contacto</h4>
            <div class="coll">
              <input type="text" id="contact_number"  value="{{ old('contact_number') }}" name="contact_number" placeholder="Número de telefono ">
            @error('contact_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="coll">
              <input type="text" id="email_address"  value="{{ old('email_address') }}" name="email_address"  placeholder="Correo Electrónico">
            @error('email_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>         
            <div class="coll">
              <input type="text" id="home_address"  value="{{ old('home_address') }}"  name="home_address" placeholder="Dirección">
               @error('home_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
           
            
            
             <div class="coll">
              <input type="text" id="city"  value="{{ old('city') }}"  name="city" placeholder="Ciudad">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
         
            <div class="coll">
              <input type="text" id="state"  value="{{ old('state') }}"  name="state" placeholder="Provincia">
                @error('state')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
           <!--   <div class="coll">
              <input type="text" id="country"  value="{{ old('country') }}"  name="country" placeholder="country">
                @error('country')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> -->
           
            <fieldset>
            <legend>Vacaciones</legend>
            <!--<div class="coll">-->
                <!--  <input type="text" value="{{ old('hourly_rate') }}" id="hourly_rate" name="hourly_rate" placeholder="Hourly Rate">-->
            <!--    @error('hourly_rate')-->
            <!--    <div class="alert alert-danger">{{ $message }}</div>-->
            <!--@enderror-->
            <!--</div>-->
            
            <h4>Añadir vacaciones</h4>
            <div class="col-add-main">
                <div class="coll">
                 <h6>Desde</h6>
                 <input placeholder="Desde"  value="{{old('vacationStaf_from')}}" class="textbox-n" type="text"  name="vacationStaf_from" onfocus="(this.type='date')" id="from">
                    @error('vacationStaf_from')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="coll">
                    <h6>Á</h6>
                 <input placeholder="Á"  value="{{old('vacationStaff_To')}}" class="textbox-n" type="text"  name="vacationStaff_To" onfocus="(this.type='date')" id="to">
                    @error('vacationStaff_To')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                </div>
               </fieldset>
               <div class="coll">
                 <input type="submit" name="add_staffButton" id="handleAjax" value="Enviar">
               </div>
            </div>
      
            
        </div>
      </div>
     </form>
</div>

<script>

        //function validate()
       // {

        // if ($('.test').filter(':checked').length < 1){
        //        alert("Please Check at least one Service Provided");
       // //         return false;
       //  }else{
      //        return true;
      //   }
    
    
       // }
</script>




@endsection