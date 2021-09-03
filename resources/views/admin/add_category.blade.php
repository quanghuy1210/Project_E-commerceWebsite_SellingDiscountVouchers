@extends('admin_layout')
@section('content_ad')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Voucher
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/save-category')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <?php
                        $massage = Session::get('tn');
                        if ($massage != null) { ?>
                            <span style="color:red;width: 100%;text-align: center;font-weight: bold; height: 50px;"><?php echo $massage; ?></span>
                        <?php Session::put('tn', null);
                        }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Voucher</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thuộc lớp danh mục</label>
                            <select class="form-control input-sm m-bot15" name="parent_id">
                                <?php foreach ($add as $k => $v) {
                                    if ($v->id_dm != 1 && $v->id_dm != 2 && $v->id_dm != 3 && $v->id_dm != 4) {
                                        echo '<option value =' . $v->id_dm . '>' . $v->dmname . '</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                            <textarea type="text" name="content" class="form-control" id="exampleInputPassword1" placeholder="Mô Tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="gia" class="form-control" id="exampleInputEmail1" placeholder="giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số tiền giảm</label>
                            <input type="text" name="discount" class="form-control" id="exampleInputEmail1" placeholder="giảm giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh</label>
                            <label for="myfile">Chọn ảnh:</label>
                            <input type="file" id="myfile" name="anh" class="form-control"><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">list Ảnh</label>
                            <label for="myfile">chon anh</label>
                            <input type="file" id="myfile" name="anh_list" multiple class="form-control"><br>
                        </div>
                        <div class="form-group">
                            <label for="birthdaytime">Hạn sử dụng</label>
                            <input type="datetime-local" id="birthdaytime" name="han">
                        </div>
                        <button type="submit" name="add_category" class="btn btn-info">Thêm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>


@endsection