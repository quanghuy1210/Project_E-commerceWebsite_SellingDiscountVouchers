@extends('admin_layout')
@section('content_ad')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Danh Mục Voucher
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/save-category-product') }}" method="POST">
                        {{ csrf_field() }}
                        <?php
                        $massage = Session::get('tn');
                        if ($massage != null) { ?>
                        <span style="color:red;width: 100%;text-align: center;font-weight: bold; height: 50px;"><?php echo $massage; ?></span>
                        <?php Session::put('tn', null);}
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" name="name_dm" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả</label>
                            <textarea type="text" name="dr_dm" class="form-control" id="exampleInputPassword1"
                                placeholder="Mô Tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thuộc lớp danh mục</label>
                            <select class="form-control input-sm m-bot15" name="parent_id">
                                <option value="1">Ẩm Thực</option>
                                <option value="2">Spa & Làm Đẹp</option>
                                <option value="3">Giải Trí & Thể Thao</option>
                                <option value="4">Massage Nam Nữ</option>
                                <option value="5">Hotel & Resort</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">
        Danh Mục Voucher
    </div>
    <div>
        <table class="table" ui-jq="footable" ui-options='{
            "paging": {
                "enabled": true
            },
            "filtering": {
                "enabled": true
            },
            "sorting": {
                "enabled": true
            }}'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Thuộc danh mục con</th>
                    <th>sx_donhan</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($add as $key => $value)
                <tr>
                    <th>{{$value->id_dm}}</th>
                    <th>{{$value->dmname}}</th>
                    <th>{{$value->description}}</th>
                    <th>{{$value->parent_id}}</th>
                    <th>{{$value->sx_donhang}}</th>
                    <th>{{$value->created}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
