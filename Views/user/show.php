<div class="container" style="width:600px">
    <h1 class= "text-center">Chi tiết cá nhân</h1>
    <div class="card">        <div class="card-header" style="text-align: center;color:red">Thông tin <b style="color:black"><?php echo $user->name ?></b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red">Tên : <b style="color:black"> <?php echo $user->name ?> </b> </h5>
                <p class="card-text" style="color:red">Email : <b style="color:black"> <?= $user->email ?> </b></p>
                <p class="card-text" style="color:red">Số điện thoại : <b style="color:black"><?= $user->numberPhone ?> </b></p>
            </div>
            </hr>
        </div>
    </div>
    <div class= "mt-2 text-end">
        <a class="btn btn-info"  href="index.php?users=edit&&id=<?php echo $user->id; ?>">sữa</a>
    <a href="index.php?home=home" class="btn btn-success"> Quay lại</a>
    </div>
</div>