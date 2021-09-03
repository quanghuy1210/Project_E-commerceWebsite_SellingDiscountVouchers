@extends('welcome')
@section('content')


<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            @foreach($voucher as $k=> $v)
            <img src="{{asset('public/upload/'.$v->image_link)}}" alt="{{$v->name}}" />
            @endforeach
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information">
            @foreach($voucher as $k=> $v)
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$v->name}}</h2>
            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span>{{number_format($v->gia).' '.'VND'}}</span>
                <label>Quantity:</label>
                <input type="text" value="1" />
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm vào giỏ
                </button>
            </span>
            @endforeach
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#reviews" data-toggle="tab">Chi Tiết</a></li>
            <li><a href="#details" data-toggle="tab">Liên Quan</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details">
            @foreach($voucher as $k=> $v)
            <?php
            foreach ($n as $key => $value) {
                if ($v->danhmuc_id == $value->danhmuc_id) { ?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery1.jpg" alt="" />
                                    <h2>{{number_format($value->gia).' '.'VND'}}</h2>
                                    <p>{{$value->name}}</p>
                                    <a href="{{URL::to('/chi-tiet-sp/'.$v->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-hand-o-up"></i>Chi tiết sản phẩm</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>
            @endforeach
        </div>

        <div class="tab-pane fade active in" id="reviews">
            <div class="col-sm-12">
                @foreach($voucher as $k=> $v)
                <ul>
                    <li><i class="fa fa-user"></i> {{$v->name}} </li>
                    <li><i class="fa fa-clock-o"></i> 12:41 PM </li>
                    <li><i class="fa fa-calendar-o"></i> 31 DEC 2014 </li>
                </ul>
                <p>{{$v->content}}</p>
                <hr>
                <p><b>Đánh giá của bạn</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name" />
                        <input type="email" placeholder="Email Address" />
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection