@extends('layout-user.app')

@section('content')
<style>
   .metting-schedule.staff-grid img {
	width: 178px;
	height: 178px;
	object-fit: cover;
	border-radius: 50%;
}
</style>
      
        
 <div class="content-wrapper">

      @if ($message = Session::get('staff_status'))    
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
          </div>
      @endif
      
       @if ($message = Session::get('update_staff_status'))    
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ $message }}</strong>
          </div>
      @endif
        
    <div class="staff-block">
        <div class="staff-heading content-header">
            <h1 class="m-0">Personal</h1>
        </div> 
        <div class="appoinment right">
            <a href="{{ url('add-staff') }}">Nuevo<img src="dist/img/plus.png"></a>
        </div>
    </div>
    
       <div class="metting-schedule staff-grid">
           
          @foreach($getAll_staff as $data)
                
          <a href="{{ url('single-staff/'.$data->id) }}"> 
        <div class="staff-grid-list">
          <img src="{{ asset('public/staff_images/'.$data->image) }}">
          <h3 class="staff-name">{{ $data->first_name }}</h3>
        </div> 
        </a>
        @endforeach
      </div>
      
</div>
    

@endsection