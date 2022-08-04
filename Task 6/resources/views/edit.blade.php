@extends('layouts.parent');
@section('title','Update Products');
@section('content')
<div class="col-12">
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
    <form action="{{route('dashboard.products.index.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6 mb-3" >
                <label for="name_en">Name En</label>
                <input type="text" class="form-control" name="name_en" placeholder="Enter Name En" value="{{$product->name_en}}">
                @error('name_en')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="name_en">Name Ar</label>
                <input type="text" class="form-control" name="name_ar" placeholder="Enter Name ar " value="{{$product->name_ar}}">
                @error('name_ar')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="quantity">Quantity </label>
                <input type="number" name="quantity" class="form-control"  placeholder="Enter quantity" value="{{$product->quantity}}">
                @error('quantity')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control"  placeholder="Enter price" value="{{$product->price}}">
                @error('price')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="code">Code</label>
                <input type="number" name="code" class="form-control"  placeholder="Enter Code" value="{{$product->code}}">
                @error('code')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="price">Status</label>
                <select name="status" id="" class="form-control" >
                    <option value="1" @selected($product->status==1)>Active</option>
                    <option value="0" @selected($product->status==0)>Not Active</option>


                </select>
                @error('status')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="brand_id">brand</label>
                <select name="brand_id" id="" class="form-control">
                    @foreach ($brands as $brand )
                    <option value="{{$brand->id}}" @selected($product->brand_id=-$brand->id)>{{$brand->name_en}} </option>
                    @endforeach

                </select>
                @error('brand')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="" class="form-control">
                    @foreach ($subcategories as $subcategory )
                    <option value="{{$subcategory->id}}" @selected($product->subcategory_id=-$subcategory->id)>{{$subcategory->name_en}}</option>
                    @endforeach

                </select>
                @error('subcategory_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <label for="details_en">Detalis-en</label>

              <textarea name="details_en" id=""class="form-control" >
                {{$product->details_en}}
              </textarea>
              @error('details_en')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="col-6">
                <label for="details-ar">Detalis-ar</label>
              <textarea name="details_ar" id=""  class="form-control"
              >{{$product->details_ar}}
              </textarea>
              @error('details_ar')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="file">
                        <img src="{{asset('images/products/'.$product->image)}}" id="image" style='cursor:pointer'>
                    </label>
                    <input type="file" name="image" id="file" onchange="loadFile(event)" class= "d-none" >
                    @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-info w-50 ml-auto ">Update</button>
            </div>
        </div>

    </form>
</div>
@endsection
@section('js')
<script>
    var loadFile = function(event) {
      var output = document.getElementById('image');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
  @endsection
