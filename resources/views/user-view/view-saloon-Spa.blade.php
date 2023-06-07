@extends('layout-user.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    
      

    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Salon y spa </h1>
      </div> 
      
    </div>

        <div class="staff-main-block">
          <div class="metting-schedule overview marketing-height">
          <section class="filters">
            <div class="flex-new-btn flex-block">
            <ul class="filters-content account nav-pad">
              <button class="filters__button is-active filter_1" data-target="#salon">
               Information del salon 
              </button>
              <!-- <button class="filters__button" data-target="#personal">
                Personal Information
              </button> -->
              <button class="filters__button filter_2" data-target="#treatments">
                Mis tratamientos 
              </button>
              <!-- <button class="filters__button" data-target="#subscription">
                My Subscription
              </button> -->
            </ul>
            
            </div>

            <div>

              <div data-content class="is-active" id="salon">
                <!--<div class="new_page-add">-->
                <!--<div class="appoinment edit">-->
                <!--              <a href="{{ url('add-salon') }}">Add New<img src="dist/img/plus.png"></a>-->
                <!--            </div>-->
                <!--          </div>-->
                <div class="information-block">
                  <div class="information-left">
                    <div class="upload__box">
                      <div class="upload__img-wrap"></div>
                      <div class="upload__btn-box">
                                <?php   
                                        if(isset($getSalonUserDetails->image)) {
                                            $ObjEditImageAll  =   $getSalonUserDetails->image;
                                    $obj  =   explode(",",$ObjEditImageAll);
                                
                                for($i=0;$i<count($obj);$i++) {        
                                
                                ?>
                       
                      <div class="upload__btn-box">
                            <img src="{{asset('public/salon_images/saloon_imagesAll/' .$obj[$i])}}">
                      </div>
                      
                      <?php  } } ?>
                      </div>
                    </div>
                </div>
                <div class="information-right">
                  <div class="salon-main">
                  <h2>Descripcion</h2>      
                  <h1 class="info_-heading">{{ $getDetailsUser->saloon_name }}</h1>
                  <div class="otherPages" data-modal="modalfive">
                            <div class="appoinment edit">
                              <a href="{{ url('add-salon') }}">Personalizar 
<img src="dist/img/edit.png"></a>
                            </div>
                        </div>
                      </div>
                      <p>  <?php if(!empty($getSalonUserDetails->description)) { echo $getSalonUserDetails->description; }  ?></p>
                  <div class="basic-info-block ">             
                    <h4>Información básica </h4>
                    <ul>
                      <li><span>Ciudad</span><span><?php  if(!empty($getSalonUserDetails->city)) { echo $getSalonUserDetails->city; } ?></span></li>
                      <li><span>Nombre del calle</span><span><?php  if(!empty($getSalonUserDetails->address)) { echo $getSalonUserDetails->address; } ?></span></li> 
                      <li><span>Codigo postal</span><span><?php  if(!empty($getSalonUserDetails->zipcode)) { echo $getSalonUserDetails->zipcode; } ?></span></li>
                      <li><span>Hora de abrir</span><span><?php  if(!empty($getSalonUserDetails->opening_timing)) { echo $getSalonUserDetails->opening_timing; } ?></span></li>
                      <li><span>Hora de cerar</span><span><?php  if(!empty($getSalonUserDetails->closing_timing)) { echo $getSalonUserDetails->closing_timing; } ?></span></li>
                    </ul>
                  </div>
                    <div class="basic-info-block"> 
                      <div class="edit-option">
                        <h4>Informacion personal </h4>
                       <!--  <div class="otherPages" data-modal="modaltwo">
                            <div class="appoinment edit">
                            <a href="#">Edit<img src="dist/img/edit.png"></a>
                            </div>
                        </div> -->
                          <div id="modaltwo" class="modal" style="display: none;">
                              <div class="modal-dialog cate-box">
                                  <div class="modal-content">
                                      <div class="modal-header header-top block">
                                        
                                        <div class="category-form">
                                          <form class="edit-form">
                                            <div class="form-item">
                                              <label for="email">Correo electronico:</label>
                                              <input type="text" id="email" name="email">
                                            </div>
                                              <div class="form-item">
                                              <label for="phone">Numero de telefono</label>
                                              <input type="text" id="phone" name="phone">
                                            </div>                                         
                                          </form> 
                                        </div>
                                        <div class="modal-footer center category-pop">
                                          <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Update</button>
                                          <button type="button" class="close-btn close close-button">Cancel</button>
                                      </div>
                                         
                                      </div>
                                     
                                  </div>
                              </div>
                          </div>                         
                        </div>
                        <div class="basic-info-block new-basic">
                            <ul>
                              <li><span>Correo electronico</span><span>{{ $getDetailsUser->email }}</span></li>
                              <li><span>Numero de telefono</span><span>{{ $getDetailsUser->phone }}</span></li>
                          </ul>
                        </div>
                      </div>
                    </div> 
                </div>
            </div>

               <!--  <div data-content id="personal">
                <div class="information-block">
                  <div class="staff-left-block">
                    <div class="left-top">
                      

                         <div class="file-upload">
                            <div class="image-upload-wrap">
                              <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                              <div class="drag-text">
                                <h3>Upload Image</h3>
                              </div>
                            </div>
                            <div class="file-upload-content">
                              <img class="file-upload-image" src="#" alt="your image" />
                              
                            </div>
                            <div class="upload-img">
                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">upload file</button>
                            </div>

                            
                          </div>



                        
                        <div class="color-picker">
                         <h4> Assign a Color</h4>
                        <input type="color" id="favcolor" name="favcolor" value="#ff0000">
                      </div>
                    </div> 
                    
                  </div>
                <div class="information-right">
                  <h1 class="info_-heading">Karlee Schamberger</h1>
                  <h3 class="info-sub-heading">Medsoap Salon & Spa</h3>
                  <div class="basic-info-block ">             
                    <h4>Basic Information</h4>
                    <ul>
                      <li><span>City</span><span>Algonquin, Indiana</span></li>
                      <li><span>Street Address</span><span>1521 S Randall Rd</span></li>
                      <li><span>Zip/Postal Code</span><span>60102</span></li>
                    </ul>
                  </div>
                    <div class="basic-info-block"> 
                      <div class="edit-option">
                        <h4>Profile Information</h4>
                        <div class="otherPages" data-modal="modalthree">
                            <div class="appoinment edit">
                            <a href="#">Edit<img src="dist/img/edit.png"></a>
                            </div>
                        </div>
                          <div id="modalthree" class="modal" style="display: none;">
                              <div class="modal-dialog cate-box">
                                  <div class="modal-content">
                                      <div class="modal-header header-top block">                                        
                                        <div class="category-form">
                                          <form class="edit-form">
                                            <div class="form-item">
                                              <label for="username">Username</label>
                                              <input type="text" id="email" name="email">
                                            </div>
                                              <div class="form-item">
                                              <label for="phone">Phone Number</label>
                                              <input type="text" id="phone" name="phone">
                                            </div> 
                                            <div class="form-item">
                                              <label for="pwd">Password</label>
                                              <input type="password" id="pwd" name="pwd" minlength="12">
                                            </div>
                                              <div class="form-item">
                                              <label for="phone">Phone Number</label>
                                              <input type="text" id="phone" name="phone">
                                            </div>                                         
                                          </form> 
                                        </div>
                                        <div class="modal-footer center category-pop">
                                          <button type="button" class="update-btn close close-button" data-dismiss="modal" aria-hidden="true">Update</button>
                                          <button type="button" class="close-btn close close-button">Cancel</button>

                                      </div>
                                         
                                      </div>
                                     
                                  </div>
                              </div>
                          </div>                         
                        </div>
                        <div class="basic-info-block new-basic">
                            <ul>
                              <li><span>Username</span><span>Username.xysmedsoapspa</span></li>
                              <li><span>Password</span><span>medsoapspa12</span></li>
                               <li><span>Email Address</span><span>xysmedsoapspa@xyz.com</span></li>
                                <li><span>Phone Number</span><span>+25 215 452 7855</span></li>
                          </ul>
                        </div>
                      </div>
                </div>
            </div>


              </div> -->

              <div data-content id="treatments">
                
                <div class="otherPages new_page-add" data-modal="modalseven" data-bs-backdrop="static" tabindex="-1">
                            <div class="appoinment edit">
                                Añadir nuevo<img src="dist/img/plus.png">
                            </div>
                        </div>
                        <div id="modalseven" class="modal" style="display: none;">
                              <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                      <div class="popup-category">
                        <h3>Añadir</h3>
                        
                      </div>
                      <div class="category-form new-form">
                        <div class="left-form">
                      
                          <input type="text" disabled class="left" value="{{ $getDetailsUser->saloon_name }}" placeholder="Name of Salon">                         
                          <input type="text" class="left" name="saloon_treatment" id="saloon_treatment" placeholder="Nombre del tratamiento">

                          <select name="staff_member_id" id="staff_member_id">
                                <option value="">Seleccione un empleado</option>
                                @foreach($getStaffmember as $getStaffmembers)
                                <option value="{{$getStaffmembers->id}}">{{$getStaffmembers->first_name}}</option>
                                @endforeach
                            </select> 
                       
                        <!-- </form> -->
                      </div>
                  
                    <div class="right-form">
                   
                            <select name="salooncategory" id="salooncategory">
                                <option value="">Elige una categoria </option>
                                <option value="men">Hombre</option>
                                <option value="women">Mujer</option>
                                <option value="child">Niño</option>
                            </select> 
                       
                        
                          <input type="text" class="left" id="price" placeholder="€0.00">
                          
                          <input type="text" id="set_hours" class="left" placeholder="Añadir horas">
                          <input type="text" class="left" id="set_minute" placeholder="Añadir minutos">
                            
                       
                    </div>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="insert-treament-btn insert-treatment" data-dismiss="modal" aria-hidden="true">Añadir</button>
                         <button type="button" class="close-btn close close-button">Cancelar</button>
                                         
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>



            <div class="styles-block">
                <div class="servicepage__Grids">
				
				
			
                <div class="services_boxes">
                    <h3> Hombre </h3>
                      @foreach($getSalonTreatment as $data)
                           @if($data->treatment_category=="men")
                        <div class="box">
                        <div class="upper_div"><h4>{{ $data->treatment_name }} </h4><p class="price">€ {{ $data->treatment_rate }}</p>
                        <div class="otherPages edit-pop-up" data-modal="modalnine_{{ $data->id }}"><span class="icon"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.474 3.40783L15.592 5.52483L13.474 3.40783ZM14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283V1.54283Z" stroke="#29A1C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16 12.9998V15.9998C16 16.5302 15.7893 17.0389 15.4142 17.414C15.0391 17.789 14.5304 17.9998 14 17.9998H3C2.46957 17.9998 1.96086 17.789 1.58579 17.414C1.21071 17.0389 1 16.5302 1 15.9998V4.99976C1 4.46932 1.21071 3.96061 1.58579 3.58554C1.96086 3.21047 2.46957 2.99976 3 2.99976H6" stroke="#29A1C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
            </div>
        
        <div id="modalnine_{{ $data->id }}" class="modal" style="display: none;">
            <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                    <div class="popup-category">
                        <h3>Edit</h3>
                    
                    </div>
                      <div class="category-form new-form">
                        <div class="left-form">
                        <form>
                          <input type="text" class="left" id="treatment_name-{{ $data->id }}" value="{{ $data->treatment_name }}" placeholder="Name of Salon">                         
                        </form>
                      </div>
                  
                    <div class="right-form">
                        <form>
                            <select name="salooncategory" id="salooncategory-{{ $data->id }}">
                                <option value="">Elige una categoria </option>
                                <option value="men" {{ ( $data->treatment_category == "men") ? 'selected' : '' }}>Hombre</option>
                                <option value="women" {{ ( $data->treatment_category == "women") ? 'selected' : '' }}>Mujer</option>
                                <option value="child" {{ ( $data->treatment_category == "child") ? 'selected' : '' }}>Niño</option>
                            </select> 
                              
                        </form>
                       
                          <input type="text" class="left" id="treatment_rate-{{ $data->id }}" placeholder="$0.00" value="{{ $data->treatment_rate }}">    
                           <input type="text"  id="treatment_hours-{{ $data->id }}" class="left" placeholder="Set Hours" value="{{ $data->treatment_hours }}">
                          <input type="text" class="left" id="treatment_minute-{{ $data->id }}" placeholder="Set Minute" value="{{ $data->treatment_minute }}"> 

                        
                    </div>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="update-btn"  treatment-id ="{{ $data->id }}" data-dismiss="modal" aria-hidden="true">Añadir</button>
                         <button type="button" class="close-btn close close-button">Cancelar</button>
                                         
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
  </div>
  <div class="upper_div lower_div"><h4>Tiempo de duración aproximado</h4><p class="price">{{ $data->treatment_hours }}:{{ $data->treatment_minute }}</p>
    <div class="otherPages" data-modal="modalten_{{ $data->id }}"><span class="icon"><svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M5.4375 1.6875H5.25C5.35313 1.6875 5.4375 1.60312 5.4375 1.5V1.6875H12.5625V1.5C12.5625 1.60312 12.6469 1.6875 12.75 1.6875H12.5625V3.375H14.25V1.5C14.25 0.672656 13.5773 0 12.75 0H5.25C4.42266 0 3.75 0.672656 3.75 1.5V3.375H5.4375V1.6875ZM17.25 3.375H0.75C0.335156 3.375 0 3.71016 0 4.125V4.875C0 4.97813 0.084375 5.0625 0.1875 5.0625H1.60312L2.18203 17.3203C2.21953 18.1195 2.88047 18.75 3.67969 18.75H14.3203C15.1219 18.75 15.7805 18.1219 15.818 17.3203L16.3969 5.0625H17.8125C17.9156 5.0625 18 4.97813 18 4.875V4.125C18 3.71016 17.6648 3.375 17.25 3.375ZM14.1398 17.0625H3.86016L3.29297 5.0625H14.707L14.1398 17.0625Z" fill="#BE0404"></path>
    </svg>
    </span>
  </div>
<div id="modalten_{{ $data->id }}" class="modal" style="display: none;">
            <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                      <div class="popup-category">
                        <h3>Delete</h3>
                       
                      </div>
                      <div class="category-form">
                        <h3>Do you realy want to delete this service ?</h3>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="delete_treatment-btn close close-button delete-treatment-id" data-dismiss="modal" aria-hidden="true" delete-treatment-id ="{{ $data->id }}">Delete</button>
                        <button type="button" class="close-btn close close-button">Cancelar</button>
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
 </div>
    @endif
	@endforeach
</div>

  <div class="services_boxes">
  <h3>Mujer</h3>
  @foreach($getSalonTreatment as $data)
                           @if($data->treatment_category=="women")
  <div class="box">
  <div class="upper_div"><h4>{{ $data->treatment_name }}</h4><p class="price">€ {{ $data->treatment_rate }}</p><div class="otherPages" data-modal="modalnine_{{ $data->id }}"><span class="icon"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.474 3.40783L15.592 5.52483L13.474 3.40783ZM14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283V1.54283Z" stroke="#29A1C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  <path d="M16 12.9998V15.9998C16 16.5302 15.7893 17.0389 15.4142 17.414C15.0391 17.789 14.5304 17.9998 14 17.9998H3C2.46957 17.9998 1.96086 17.789 1.58579 17.414C1.21071 17.0389 1 16.5302 1 15.9998V4.99976C1 4.46932 1.21071 3.96061 1.58579 3.58554C1.96086 3.21047 2.46957 2.99976 3 2.99976H6" stroke="#29A1C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg>
  </span>
</div>
<div id="modalnine_{{ $data->id }}" class="modal" style="display: none;">
            <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                      <div class="popup-category">
                        <h3>Edit</h3>
                        
                      </div>
                      <div class="category-form new-form">
                        <div class="left-form">
                        <form>
                          <input type="text" class="left"  id="treatment_name-{{ $data->id }}" placeholder="Name of Salon" value="{{ $data->treatment_name }}">                         
                        </form>
                      </div>
                  
                    <div class="right-form">
                      <form>
                             <select name="salooncategory" id="salooncategory-{{ $data->id }}">
                                <option value="">Elige una categoria </option>
                                <option value="men" {{ ( $data->treatment_category == "men") ? 'selected' : '' }}>Hombre</option>
                                <option value="women" {{ ( $data->treatment_category == "women") ? 'selected' : '' }}>Mujer</option>
                                <option value="child" {{ ( $data->treatment_category == "child") ? 'selected' : '' }}>Niño</option>
                            </select>   
                        </form>
                    
                          <input type="text" class="left"  id ="treatment_rate-{{ $data->id }}" placeholder="$0.00" value="{{ $data->treatment_rate }}">    
                            <input type="text"  id="treatment_hours-{{ $data->id }}" class="left" placeholder="Set Hours" value="{{ $data->treatment_hours }}">
                          <input type="text" class="left" id="treatment_minute-{{ $data->id }}" placeholder="Set Minute" value="{{ $data->treatment_minute }}"> 
                        
                    </div>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="update-btn" treatment-id ="{{ $data->id }}" data-dismiss="modal" aria-hidden="true">Añadir</button>
                         <button type="button" class="close-btn close close-button">Cancelar</button>
                                         
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
  </div>
  <div class="upper_div lower_div"><h4>Tiempo de duración aproximado</h4><p class="price">{{ $data->treatment_hours }}:{{ $data->treatment_minute }}</p><div class="otherPages" data-modal="modalten_{{ $data->id }}"><span class="icon"><svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.4375 1.6875H5.25C5.35313 1.6875 5.4375 1.60312 5.4375 1.5V1.6875H12.5625V1.5C12.5625 1.60312 12.6469 1.6875 12.75 1.6875H12.5625V3.375H14.25V1.5C14.25 0.672656 13.5773 0 12.75 0H5.25C4.42266 0 3.75 0.672656 3.75 1.5V3.375H5.4375V1.6875ZM17.25 3.375H0.75C0.335156 3.375 0 3.71016 0 4.125V4.875C0 4.97813 0.084375 5.0625 0.1875 5.0625H1.60312L2.18203 17.3203C2.21953 18.1195 2.88047 18.75 3.67969 18.75H14.3203C15.1219 18.75 15.7805 18.1219 15.818 17.3203L16.3969 5.0625H17.8125C17.9156 5.0625 18 4.97813 18 4.875V4.125C18 3.71016 17.6648 3.375 17.25 3.375ZM14.1398 17.0625H3.86016L3.29297 5.0625H14.707L14.1398 17.0625Z" fill="#BE0404"></path>
  </svg>
  </span>
</div>
<div id="modalten_{{ $data->id }}" class="modal" style="display: none;">
            <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                      <div class="popup-category">
                        <h3>Delete</h3>
                       
                      </div>
                      <div class="category-form">
                        <h3>Do you realy want to delete this service ?</h3>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="delete-treatment-id close close-button" data-dismiss="modal" aria-hidden="true" delete-treatment-id = "{{ $data->id }}">Delete</button>
                                          <button type="button" class="close-btn close close-button">Cancelar</button>
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
  </div>
  </div>
     @endif
     @endforeach
     
  </div>
  
    <div class="services_boxes">
    <h3>Niño</h3>
    
     @foreach($getSalonTreatment as $data)
                           @if($data->treatment_category=="child")
    <div class="box">
    <div class="upper_div"><h4>{{  $data->treatment_name }}</h4><p class="price">€ {{  $data->treatment_rate }}</p><div class="otherPages" data-modal="modalnine_{{  $data->id }}"><span class="icon"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.474 3.40783L15.592 5.52483L13.474 3.40783ZM14.836 1.54283L9.109 7.26983C8.81309 7.56533 8.61128 7.94181 8.529 8.35183L8 10.9998L10.648 10.4698C11.058 10.3878 11.434 10.1868 11.73 9.89083L17.457 4.16383C17.6291 3.99173 17.7656 3.78742 17.8588 3.56256C17.9519 3.33771 17.9998 3.09671 17.9998 2.85333C17.9998 2.60994 17.9519 2.36895 17.8588 2.14409C17.7656 1.91923 17.6291 1.71492 17.457 1.54283C17.2849 1.37073 17.0806 1.23421 16.8557 1.14108C16.6309 1.04794 16.3899 1 16.1465 1C15.9031 1 15.6621 1.04794 15.4373 1.14108C15.2124 1.23421 15.0081 1.37073 14.836 1.54283V1.54283Z" stroke="#29A1C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  <path d="M16 12.9998V15.9998C16 16.5302 15.7893 17.0389 15.4142 17.414C15.0391 17.789 14.5304 17.9998 14 17.9998H3C2.46957 17.9998 1.96086 17.789 1.58579 17.414C1.21071 17.0389 1 16.5302 1 15.9998V4.99976C1 4.46932 1.21071 3.96061 1.58579 3.58554C1.96086 3.21047 2.46957 2.99976 3 2.99976H6" stroke="#29A1C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg>
  </span>
</div>
<div id="modalnine_{{  $data->id }}" class="modal" style="display: none;">
            <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                      <div class="popup-category">
                        <h3>Edit</h3>
                        
                      </div>
                      <div class="category-form new-form">
                        <div class="left-form">
                        <form>
                          <input type="text" class="left" id="treatment_name-{{ $data->id }}" placeholder="Name of Salon" value="{{ $data->treatment_name }}">                         
                     
                        </form>
                      </div>
                  
                    <div class="right-form">
                      <form>
                         <select name="salooncategory" id="salooncategory-{{ $data->id }}">
                                <option value="">Elige una categoria </option>
                                <option value="men" {{ ( $data->treatment_category == "men") ? 'selected' : '' }}>Hombre</option>
                                <option value="women" {{ ( $data->treatment_category == "women") ? 'selected' : '' }}>Mujer</option>
                                <option value="child" {{ ( $data->treatment_category == "child") ? 'selected' : '' }}>Niño</option>
                            </select> 
                        </form>
                    
                        <input type="text" class="left" id="treatment_rate-{{ $data->id }}"  placeholder="$0.00" value="{{ $data->treatment_rate }}">    
                            <input type="text" id="treatment_hours-{{ $data->id }}" class="left" placeholder="Set Hours" value="{{ $data->treatment_hours }}">
                          <input type="text" class="left" id="treatment_minute-{{ $data->id }}" placeholder="Set Minute" value="{{ $data->treatment_minute }}"> 

                    </div>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="update-btn" treatment-id ="{{ $data->id }}" data-dismiss="modal" aria-hidden="true">Añadir</button>
                         <button type="button" class="close-btn close close-button">Cancelar</button>
                                         
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="upper_div lower_div"><h4>Tiempo de duración aproximado</h4><p class="price">{{ $data->treatment_hours }}:{{ $data->treatment_minute }}</p><div class="otherPages" data-modal="modalten_{{ $data->id }}"><span class="icon"><svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.4375 1.6875H5.25C5.35313 1.6875 5.4375 1.60312 5.4375 1.5V1.6875H12.5625V1.5C12.5625 1.60312 12.6469 1.6875 12.75 1.6875H12.5625V3.375H14.25V1.5C14.25 0.672656 13.5773 0 12.75 0H5.25C4.42266 0 3.75 0.672656 3.75 1.5V3.375H5.4375V1.6875ZM17.25 3.375H0.75C0.335156 3.375 0 3.71016 0 4.125V4.875C0 4.97813 0.084375 5.0625 0.1875 5.0625H1.60312L2.18203 17.3203C2.21953 18.1195 2.88047 18.75 3.67969 18.75H14.3203C15.1219 18.75 15.7805 18.1219 15.818 17.3203L16.3969 5.0625H17.8125C17.9156 5.0625 18 4.97813 18 4.875V4.125C18 3.71016 17.6648 3.375 17.25 3.375ZM14.1398 17.0625H3.86016L3.29297 5.0625H14.707L14.1398 17.0625Z" fill="#BE0404"></path>
  </svg>
  </span>
</div>
<div id="modalten_{{ $data->id }}" class="modal" style="display: none;">
            <div class="modal-dialog cate-box">
                <div class="modal-content">
                    <div class="modal-header header-top block">
                      <div class="popup-category">
                        <h3>Delete</h3>
                       
                      </div>
                      <div class="category-form">
                        <h3>Do you realy want to delete this service ?</h3>
                      </div>
                      <div class="modal-footer center category-pop">
                         <button type="button" class="delete-treatment-id close close-button " data-dismiss="modal" aria-hidden="true" delete-treatment-id ="{{ $data->id }}">Delete</button>
                                          <button type="button" class="close-btn close close-button">Cancelar</button>
                    </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    </div>
    
    @endif
    @endforeach
    
      </div>
    </div>

                   </div>
                  
                  </div>




              <div data-content id="my subscription">
                
              </div>
          </div>
          </section>
    
          </div>
        </div>
  </div>
  

  <!-- /.content-wrapper -->
  @endsection