@extends('layouts.parent');
@section('title','Products');
@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@elseif (session('erorr'))
<div class="alert alert-danger">
    {{session('erorr')}}
</div>
@endif

</div>

<div class="col-12">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name En</th>
            <th scope="col">Name Ar</th>
            <th scope="col">Code</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col">Creation at</th>
            <th scope="col">Operations</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)

          <tr>
            <th scope="row">{{$product->id}}</th>

            <td>{{$product->name_en}}</td>
            <td>{{$product->name_ar}}</td>
            <td>{{$product->code}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->status}}</td>
            <td>{{$product->created_at}}</td>
            <td>
                <a href="{{route('dashboard.products.index.edit',$product->id)}}" class="btn btn-info">Update</a>
                <a  href="{{route('dashboard.products.index.delete',$product->id)}}"class="btn btn-danger">Delete</a>

            </td>


          </tr>
          @endforeach


        </tbody>
      </table>
</div>
@endsection
@section('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  @endsection
