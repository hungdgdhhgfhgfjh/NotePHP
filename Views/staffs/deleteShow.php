<div class="container" style="width:600px">
    <h1 class= "text-center">Chi tiết Nhân viên</h1>
    <div class="card">        <div class="card-header" style="text-align: center;color:red">Thông tin <b style="color:black"><?= $staff->name; ?></b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red">Tên : <b style="color:black"> <?= $staff->name ?> </b> </h5>
                <p class="card-text" style="color:red">Chức vụ : <b style="color:black"> <?= $staff->position ?> </b></p>
                <p class="card-text" style="color:red">Số điện thoại : <b style="color:black"> <?= $staff->numberPhone; ?> </b></p>
                <p class="card-text" style="color:red">email : <b style="color:black"> <?= $staff->email; ?> </b></p>
            </div>
            </hr>
        </div>
    </div>
    <div class= "mt-2 text-end">
    <a onclick="return confirm('bạn có muốn xóa không')" class="btn btn-danger" href="index.php?staffs=delete&&id=<?= $staff->id; ?>">Xóa</a>
    <a href="index.php?staffs=index" class="btn btn-success"> Quay lại</a>
    </div>
</div>