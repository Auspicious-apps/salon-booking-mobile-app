@extends('layout-user.app')

@section('content')

<div class="content-wrapper">
    
    <div class="treatment-block">
      <div class="treatment-heading content-header">
         <h1 class="m-0">Edit Treatment</h1>
      </div> 
    </div>
    
    @foreach ($get_treatments_detail_data as $treatment_detail)
    
 <form action="{{ url('treatment-update/'.$treatment_detail->id) }}" method="POST" >
     <input type="hidden" name="salon_id" value="{{ $treatment_detail->salon_id }}" id="salonId">
@csrf

    <div class="treatment-main-block">
        
        <div class="coll">
            <label for="treatment_category">  Category:   </label>
            <select class="form-control" id="treatment_category" name="treatment_category">
                <option value="">--Select category--</option>
                @foreach ($get_categories_data as $category)
                    <option value="{{ $category->id }}" {{ ( $category->id == $treatment_detail->treatment_category) ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>    
        
        
        <div class="coll">
             <label for="treatment_name">  Treatment Name:   </label>
              <input type="text" id="treatment_name" name="treatment_name" value="{{$treatment_detail->treatment_name}}" placeholder="Treatment Name">
            @error('treatment_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="coll">
             <label for="treatment_rate">  Treatment Rate:   </label>
              <input type="text" id="treatment_rate" name="treatment_rate" value="{{$treatment_detail->treatment_rate}}" placeholder="Treatment Rate">
            @error('treatment_rate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="coll">
             <label for="treatment_time">  Treatment Time:   </label>
              <input type="text" id="treatment_time" name="treatment_time" value="{{$treatment_detail->treatment_time}}" placeholder="Treatment Time">
            @error('treatment_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        
        <div class="coll">
             <label for="status">  Status:   </label>
			<select class="form-control" id="status" name="status">
		        <option value="1" {{ ( $treatment_detail->status == 1) ? 'selected' : '' }}>Active</option>
                <option value="0" {{ ( $treatment_detail->status == 0) ? 'selected' : '' }}>Deactive</option>
		    </select>
		    @error('status')
			<div class="alert alert-danger">{{ $message }}</div>
		    @enderror
	    </div>
      
      </div>
      
      <input type="submit" class="btn btn-primary" value="Update">
      
     </form>
     @endforeach
</div>
@endsection