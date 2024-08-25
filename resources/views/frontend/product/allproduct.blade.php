@extends('layouts.frontend')
@section('frontend-content')
<style>
    .next {
        text-decoration: none;
        color: black;
        font-weight: 700;
    }
    .numbers {
        color: black;
        text-decoration: none;
        padding: 5px 8px;
        margin: 0px 10px;
        border: 1px solid black;
        border-radius: 5px;
        font-weight: 600;
    }
    .numbers:hover {
        background-color: #005fac;
        color: white;
        border: 1px solid #005fac;
    }
    .active {
        background-color: #005fac;
        color: white;
        border: 1px solid #005fac;
    }
</style>


    {{-- start product section  --}}
    <div class="project_section">
        <h2 class="journy-heading fs-1 fw-bold fs-sm-3 fs-md-1 text-center mb-4">Product</h2>
        <div class="text-center d-flex gap-4 justify-content-center flex-wrap">
            @foreach ($products as $item)
                <div class="card" style="width: 17rem;">
                    <img src="{{asset('images/'.$item->images[0]->image)}}"
                        class="card-img-top p-4" alt="...">
                    <div class="card-body">
                        <a href="{{route('product-details.index',['slug'=>$item->slug])}}" class="product_link">{{$item->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>
      <div class="mt-4">
        {!! $products->links('vendor.pagination.custom') !!}
      </div>

    </div>

    {{-- end product section  --}}
@endsection
