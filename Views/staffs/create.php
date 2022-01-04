<div class="container-fluid">
    <h1 class="text-center mt-5">Thêm nhân viên</h1>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-4">
            <form action="index.php?staffs=store" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                    <input name="name" value="<?php echo (isset($_SESSION["old"]["name"]))?$_SESSION["old"]["name"]:"" ?>"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <p class="alert-danger"><?= $_SESSION['errors']["name"]=(isset($_SESSION['errors']["name"]))?$_SESSION['errors']["name"]:""; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input name="email" value="<?php echo (isset($_SESSION["old"]["email"]))?$_SESSION["old"]["email"]:"" ?>" type="text" class="form-control" id="exampleInputPassword1">
                    <p class="alert-danger"><?= $_SESSION['errors']["email"]=(isset($_SESSION['errors']["email"]))?$_SESSION['errors']["email"]:""; ?></p>
                    <p class="alert-danger"><?= $_SESSION['errors']["issetEmail"]=(isset($_SESSION['errors']["issetEmail"]))?$_SESSION['errors']["issetEmail"]:""; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input name="password" value="<?php echo (isset($_SESSION["old"]["password"]))?$_SESSION["old"]["password"]:"" ?>" type="password" class="form-control" id="exampleInputPassword1">
                    <p class="alert-danger"><?= $_SESSION['errors']["password"]=(isset($_SESSION['errors']["password"]))?$_SESSION['errors']["password"]:""; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                    <input name="numberPhone" value="<?php echo (isset($_SESSION["old"]["numberPhone"]))?$_SESSION["old"]["numberPhone"]:"" ?>" type="text" class="form-control" id="exampleInputPassword1">
                    <p class="alert-danger"><?= $_SESSION['errors']["numberPhone"]=(isset($_SESSION['errors']["numberPhone"]))?$_SESSION['errors']["numberPhone"]:""; ?></p>
                    <p class="alert-danger"><?= $_SESSION['errors']["issetPhone"]=(isset($_SESSION['errors']["issetPhone"]))?$_SESSION['errors']["issetPhone"]:""; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Chức vụ</label>
                    <input name="position" value="<?php echo (isset($_SESSION["old"]["position"]))?$_SESSION["old"]["position"]:"" ?>" type="text" class="form-control" id="exampleInputPassword1">
                    <p class="alert-danger"><?= $_SESSION['errors']["position"]=(isset($_SESSION['errors']["position"]))?$_SESSION['errors']["position"]:""; ?></p>
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Gửi</button> <a class="btn btn-warning w-100" href="index.php?staffs=index">quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php unset($_SESSION["errors"]);
    unset($_SESSION["old"]);
?>