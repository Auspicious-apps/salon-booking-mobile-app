 @extends('layout-admin.app')

@section('content') 

  
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @if ($message = Session::get('admin-edit-myaccount-status'))    
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Mi cuenta
</h1>
         <div class="appoinment edit">
         <a href="{{ url('admin-edit-myaccount') }}"<button type="button" class="admin_editMyaccount">Personalizar
 <img src="dist/img/edit.png"></button></a>
         </div>
      </div> 
    </div>
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
                   <img src="{{asset('/public/admin_images/' . $getAdmin_Data->image) }}" />
            
                </div>
               
              </div>


              
             
          </div> 
        </div>
    
    
        <div class="information-right">
                  <div class="salon-main">
                    <h1 class="info_-heading">@if(!empty($getAdmin_Data->first_name)) {{ $getAdmin_Data->first_name }} @endif  @if(!empty($getAdmin_Data->last_name)) {{ $getAdmin_Data->last_name }} @endif</h1>
                  </div>
                  <div class="basic-info-block ">             
                    <h4>Información básica </h4>
                    <ul>
                      <li><span>Ciudad</span><span>@if(!empty($getAdmin_Data->city)) {{ $getAdmin_Data->city }} @endif, @if(!empty($getAdmin_Data->state)) {{ $getAdmin_Data->state }} @endif</span></li>
                      <li><span>Nombre del calle</span><span>@if(!empty($getAdmin_Data->street_address)) {{ $getAdmin_Data->street_address }} @endif</span></li>
                      <li><span>Codigo postal</span><span>@if(!empty($getAdmin_Data->zipcode)) {{ $getAdmin_Data->zipcode }} @endif</span></li>   
                    </ul>
                  </div>
                    <div class="basic-info-block"> 
                      <div class="edit-option">
                        <h4>Datos generales</h4>
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
                                              <label for="email">Correo electrónico:</label>
                                              <input type="text" id="email" name="email">
                                            </div>
                                              <div class="form-item">
                                              <label for="phone">Numero de Télefono</label>
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
                              <li><span>Username</span><span>@if(!empty($getAdmin_Data->user_name)) {{ $getAdmin_Data->user_name }} @endif</span></li>
                              <li><span>Correo electronico</span><span>@if(!empty($getAdmin_Data->email)) {{ $getAdmin_Data->email }} @endif</span></li>
                              <li><span>Numero de telefono</span><span>@if(!empty($getAdmin_Data->phone)) {{ $getAdmin_Data->phone }} @endif</span></li>
                          </ul>
                        </div>
                      </div>
                    </div>

        </div>
      </div>
  </div>
  @endsection