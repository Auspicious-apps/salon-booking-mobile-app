@extends('layout-admin.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   	

				 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Salon Approved Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR.No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Salon Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter=1; ?>
                    @foreach($getAcceptedSaloon_Data as $data)
                     
                     @if($data->saloon_status==1)
                     
                    
                  <tr>
                      <td><?php echo $counter;?> </td>
                    <td>{{ $data->first_name }}</td>
                    <td> {{ $data->last_name }} </td>
                    <td> {{ $data->saloon_name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>@if($data->saloon_status ==0)
                        <span class="badge badge-pill badge-secondary">Pending</span>
                    @elseif($data->saloon_status ==1)
                        <span class="badge badge-pill badge-success">Approved</span>
                    @else
                        <span class="badge badge-pill badge-danger">Rejected</span>
                    @endif
                    </td>
                  
                  </tr>
                  
                  <?php $counter++; ?>
                  @endif
                  @endforeach
               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SR.No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Salon Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                
                  </tr>
                  </tfoot>
                </table>
              
              </div>
              <!-- /.card-body -->
            </div>
       

  </div>
      
    
  
@endsection
