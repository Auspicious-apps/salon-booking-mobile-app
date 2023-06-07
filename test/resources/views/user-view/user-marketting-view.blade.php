@extends('layout-user.app')

@section('content')

        
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block">
      <div class="staff-heading content-header">
         <h1 class="m-0">Marketing</h1>
      </div> 
    @if ($message = Session::get('facebook_marketing_Status'))    
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif
    </div>
        <div class="staff-main-block">
          <div class="metting-schedule overview marketing-height">
          <section class="filters">
            <ul class="filters-content">
              <button class="filters__button is-active" data-target="#facebook">
                Facebook
              </button>
              <button class="filters__button" data-target="#posters">
                Posters
              </button>
              <button class="filters__button" data-target="#banners">
                Banners
              </button>
              <button class="filters__button" data-target="#instagram">
                Instagram
              </button>
            </ul>

            <div>
              <div data-content class="is-active" id="facebook">
                <div class="tabbing-grid">
                   <div class="tabbing-grid-block-item">
                       
                       
                      @if(!empty($get_marketing_data))
                      @foreach($get_marketing_data as $data)
                        @if($data->marketingtitle == 'facebook')
                    <div class="tabbing-grid-item">
                      <div class="tab-item-img">
                       
                      <img src="{{asset('public/facebook_marketting_images/' . $data->facebook_image)}}">
                      </div>
                      
                      <div class="tabbing-grid-item-content">
                        <h1> {{ $data->title}}</h1>
                        <h3>70 * 90 cm</h3>
                        <p>Lorem Ipsum Description of the banner.</p> 
            <a href="{{ url('marketting-pdf-download/'.$data->id) }}"><button class="dwnld-btn">Download</button></a>
                      </div>
                    </div>
                     @endif
                    @endforeach
                    @endif
                    
                    
                    
                   </div>
                   

                </div>
              </div>

              <div data-content id="posters">
               <div class="tabbing-grid">
                   <div class="tabbing-grid-block-item">
                       
                 
                   @if(!empty($get_marketing_data))
                      @foreach($get_marketing_data as $data)
                        @if($data->marketingtitle == 'posters')
                     <div class="tabbing-grid-item">
                      <div class="tab-item-img">

                      <img src="{{asset('public/facebook_marketting_images/' . $data->facebook_image)}}">
                      </div>
                      <div class="tabbing-grid-item-content">
                        <h1>Banner title</h1>
                        <h3>70 * 90 cm</h3>
                        <p>Lorem Ipsum Description of the banner.</p>
                        <a href="{{ url('marketting-pdf-download/'.$data->id) }}"><button class="dwnld-btn">Download</button></a>
                      </div>
                    </div>
                    
                    @endif
                    @endforeach
                    @endif
                    
                    
                   </div>
                   
                     

                </div>
              </div>
              
              <div data-content id="banners">
                <div class="tabbing-grid">
                   <div class="tabbing-grid-block-item">
                       
                      
                      @if(!empty($get_marketing_data))
                      @foreach($get_marketing_data as $data)
                        @if($data->marketingtitle == 'banners')
                        
                     <div class="tabbing-grid-item">
                      <div class="tab-item-img">

                      <img src="{{asset('public/facebook_marketting_images/' . $data->facebook_image)}}">
                      </div>
                      <div class="tabbing-grid-item-content">
                        <h1>Banner title</h1>
                        <h3>70 * 90 cm</h3>
                        <p>Lorem Ipsum Description of the banner.</p>
                        <a href="{{ url('marketting-pdf-download/'.$data->id) }}"><button class="dwnld-btn">Download</button></a>
                      </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
             

                </div>
              </div>
              
              <div data-content id="instagram">
                <div class="tabbing-grid">
                
                
                    <div class="tabbing-grid-block-item">
                  
                
                     @if(!empty($get_marketing_data))
                      @foreach($get_marketing_data as $data)
                        @if($data->marketingtitle == 'instagram')
                    <div class="tabbing-grid-item">
                        <div class="tab-item-img">
                      <img src="{{asset('public/facebook_marketting_images/' . $data->facebook_image)}}">
                      </div>
                      <div class="tabbing-grid-item-content">
                        <h1>Banner title</h1>
                        <h3>200 * 160 cm</h3>
                        <p>Lorem Ipsum Description of the banner.</p>
                        <a href="{{ url('marketting-pdf-download/'.$data->id) }}"><button class="dwnld-btn">Download</button></a>
                      </div>
                    </div>
                    
                    @endif
                    @endforeach
                    @endif
                    </div>  

                </div>
              </div>
            </div>
          </section>
    
          </div>
        </div>
  </div>
  <!-- /.content-wrapper -->
  @endsection
