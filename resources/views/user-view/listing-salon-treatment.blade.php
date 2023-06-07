@extends('layout-user.app')

@section('content')

<div class="content-wrapper">
    
    <div class="treatment-block">
      <div class="treatment-heading content-header">
         <h1 class="m-0">Treatment List</h1>
      </div> 
    </div>
    
    <div class="treatment-main-block">
        
        <a href="{{url('treatment-add')}}">Add Treatment <img src="dist/img/plus.png"></a>
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> Sr.No.</th>
                    <th> Salon </th>
                    <th> Category </th>
                    <th> Treatment Name </th>
                    <th> Treatment Rate </th>
                    <th> Treatment Time </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                    
                <?php  $counter =1; ?>
                @foreach ($get_treatments_data as $treatment)
                  <tr>
                    <td> <?php echo $counter; ?></td>
                    <td> {{ $treatment->formatted_salon }} </td>
                    <td> {{ $treatment->formatted_category }} </td>
                    <td> {{ $treatment->treatment_name }} </td>
                    <td> {{ $treatment->treatment_rate }} </td>
                    <td> {{ $treatment->treatment_time }} </td>
                    <td>
                    <div class="act-btn">
                         <a href="{{ url('treatment-edit/'.$treatment->id) }}">Edit</a> | <a href="{{ url('treatment-delete/'.$treatment->id) }}">Delete</a>
                      </div>
                     </td>
                    </tr>
                  <?php $counter++; ?>
                @endforeach
            </tbody>
            
        </table>
    </div>
    
</div>
@endsection