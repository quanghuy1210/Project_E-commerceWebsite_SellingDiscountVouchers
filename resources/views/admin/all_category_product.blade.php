@extends('admin_layout')
@section('content_ad')

<div class="panel panel-default">
    <div class="panel-heading">
        Quản Lý Voucher
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Theo ngày tạo</option>
                <option value="1">Theo tên</option>
                <option value="2">Theo Id</option>
            </select>
            <button class="btn btn-sm btn-default">Áp dụng</button>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="button">Tìm</button>
                </span>
            </div>
        </div>
    </div>
    <div>
        <?php
        $massage = Session::get('tn');
        if ($massage != null) { ?>
            <span style="color:red;width: 100%;text-align: center;font-weight: bold; height: 50px;"><?php echo $massage; ?></span>
        <?php Session::put('tn', null);
        }
        ?>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thuộc danh mục</th>
                    <th style="width:20%;">Ảnh</th>
                    <th>Giá</th>
                    <th>Ngày tạo</th>
                    <th>Hạn sử dụng</th>
                    <th style="width:30px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $key => $value)
                <tr>
                    <th>{{ $value->id}}</th>
                    <th>{{ $value->name}}</th>
                    <th>
                        {{ $value->dmname}}
                    </th>
                    <th><img  style="width:100%;height: 100px;" src="{{('public/upload/'.$value->image_link)}}" alt="hinh"></th>
                    <th>{{number_format($value->gia).' '.'VND'}}</th>
                    <th>{{ $value->created }}</th>
                    <th>{{ $value->han }}</th>
                    <td>
                        <a href="{{URL::to('/edit-category/'.$value->id)}}" class="active" ui-toggle-class="" style="font-size: 20px;">
                            <i class="fa fa-check text-success text-active"></i>
                        </a>
                        <a href="{{URL::to('/delete-category/'.$value->id)}}" class="active" ui-toggle-class="" style="font-size: 20px;" onclick="return confirm('Bạn có chắc chắn rằng muốn xóa voucher này')">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
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
    </footer>
</div>



@endsection