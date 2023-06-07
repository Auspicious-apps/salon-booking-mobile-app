@extends('layout-admin.app')

@section('content')

<div class="card card-form">
              <div class="card-header">
                <h3 class="card-title">List of all salons</h3>
              
              </div>


               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.Nro.</th>
                    <th>Nombre del salón</th>
                    <th>Numero de télefono </th>
                    <th>Ciudad</th>
                    <th>Tratamiento</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter=1; ?>
                    @foreach($get_all_saloon as $data)
                  <tr>
                     <td><?php echo $counter;?> </td>
                    <td>{{ $data->salon_name }}</td>
                    <td> {{ $data->phone }} </td>
                    <td> {{ $data->city }}</td>
                    <td class="action-btn"><a href="{{ route('admin-saloon-id',$data->salon_id) }}">View</td>
                  </tr>
                  <?php $counter++; ?>
                  @endforeach
               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.Nro.</th>
                    <th>Nombre del salón</th>
                    <th>Numero de télefono</th>
                    <th>Ciudad</th>
                    <th>Tratamiento</th>
                  </tr>
                  </tfoot>
                </table>
              
              </div>

</div>


@endsection