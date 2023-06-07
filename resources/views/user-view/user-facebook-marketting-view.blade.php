@extends('layout-user.app')

@section('content')


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Add Marketing</h1>
      </div> 
      
    </div>
        <div class="staff-main-block">
          <div class="metting-schedule overview marketing-height marketing-form">
          <section class="filters">
        
           
    <form class="form-right-side" action="{{ url('send-add-facebook-data') }}" method="POST" enctype="multipart/form-data">
     @csrf
        <input type="hidden" name="saloon_update_id" value="">
            <div data-content class="is-active" id="salon">
                <div class="information-block new-info-sec">
					 <div class="staff-right-block new-staff_sec">

                            <div class="coll">
                                <label>Add Title</label>
                                <div class="error-msg">
                              <input type="text" id="title" name="title" value="{{old('title')}}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            
                             <div class="coll">
                                <label>Add Dimension</label>
                                <div class="error-msg">
                              <input type="text" id="dimension" name="dimension" value="{{old('dimension')}}">
                                @error('dimension')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            
                             <div class="coll">
                                <label>Add Description</label>
                                <div class="error-msg">
                              <textarea type="text" id="description" name="description" >{{old('description')}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            
                            <div class="coll">
                                <label>Choose Image</label>
                                <div class="error-msg">
                              <input type="file" id="choseimage" name="choseimage" value="{{old('choseimage')}}">
                               @error('choseimage')
                             <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            </div>
                            
                            <div class="coll">
                                <label for="marketing">Choose a marketing:</label>
                                <div class="error-msg">
                                <select name="marketing" id="marketing">
                                    <option value="">Select any option</option>
                                    <option value="facebook"  @if (old('marketing') == 'facebook') selected="selected" @endif>Facebook</option>
                                    <option value="posters" @if (old('marketing') == 'posters') selected="selected" @endif>Posters</option>
                                    <option value="Banners" @if (old('marketing') == 'Banners') selected="selected" @endif>Banners</option>
                                    <option value="instagram" @if (old('marketing') == 'instagram') selected="selected" @endif>Instagram</option>
                                </select> 
                                @error('marketing')
                             <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            </div>
                            
                             <div class="coll sub-btn">

                              <input type="submit" id="submit" name="submit" value="submit">
                            </div>
                    </div>
                </div>
            </div>
    </form>
    
    </section>
    </div>
    </div>
    
    </div>
     

@endsection