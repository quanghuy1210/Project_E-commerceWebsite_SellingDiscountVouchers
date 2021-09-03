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
<?php 
if(count($voucher)>2){ ?>
<div class="row">
    <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm">Xuất danh mục từ 4 sản phẩm trở lên</small>
    </div>
    <div class="col-sm-7 text-right text-center-xs">
        <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
        </ul>
    </div>
</div>
<?php }?>

@endsection