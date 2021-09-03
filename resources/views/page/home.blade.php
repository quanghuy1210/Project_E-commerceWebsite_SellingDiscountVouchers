@extends('welcome')
@section('content')


<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">sản phẩm</h2>
    @foreach($voucher as $k=> $v)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{asset('public/upload/'.$v->image_link)}}" alt="{{$v->name}}" />
                    <h2>{{number_format($v->gia).' '.'VND'}}</h2>
                    <p>{{$v->name}}</p>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{number_format($v->gia).' '.'VND'}}</h2>
                        <p>{{$v->name}}</p>
                        <a href="{{URL::to('/chi-tiet-sp/'.$v->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-hand-o-up"></i>Chi tiết sản phẩm</a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
</div>


@endsection