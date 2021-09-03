@extends('admin_layout')
@section('content_ad')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Voucher
            </header>
            <div class="panel-body">
            
            @foreach($edit as $key => $value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category/'.$value->id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">  
                            <label for="exampleInputEmail1">Tên voucher</label>
                            <input type="text" name="name" value="{{$value->name}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                            <textarea type="text" name="content" class="form-control" id="exampleInputPassword1"
                                placeholder="Mô Tả">{{$value->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gia</label>
                            <input type="text" name="gia" value="{{$value->gia}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên Danh Mục">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh</label>
                            <input type="file" id="myfile" name="anh" class="form-control">
                            <img src="{{URL::to('public/upload/'.$value->image_link)}}" width="100px" height="100px" alt="hinh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Discount</label>
                            <input type="text" name="discount" value="{{$value->discount}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên Danh Mục">
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            @endforeach
            </div>
        </section>

    </div>
</div>



@endsection
