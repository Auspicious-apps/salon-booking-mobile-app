@extends('layout-user.app')

@section('content')

<div class="content-wrapper">
    
    <div class="treatment-block">
      <div class="treatment-heading content-header">
         <h1 class="m-0">Add Treatment</h1>
      </div> 
    </div>
    <div class="treatement-form">
 <form action="{{ url('treatment-insert') }}" method="POST" >
     <input type="hidden" name="salon_id" value="{{ auth()->user()->salon_id }}" id="salonId">
@csrf

    <div class="treatment-main-block">
        
        <div class="coll">
            <select class="form-control" id="treatment_category" name="treatment_category">
                <option value="">--Select category--</option>
                @foreach ($get_categories_data as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>    
        
        
        <div class="coll">
              <input type="text" id="treatment_name" name="treatment_name" value="" placeholder="Treatment Name">
            @error('treatment_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="coll">
              <input type="text" id="treatment_rate" name="treatment_rate" value="" placeholder="Treatment Rate">
            @error('treatment_rate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="coll">
              <input type="text" id="treatment_time" name="treatment_time" value="" placeholder="Treatment Time">
            @error('treatment_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
      
      </div>
      
      <input type="submit" class="btn btn-primary" value="Submit">
      
     </form>
     </div>
</div>
@endsection