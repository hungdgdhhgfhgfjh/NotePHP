<div class="container-fluid">
    <h1 class="text-center mt-5">Thay đổi</h1>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-4">
            <form action="index.php?users=update&&id=<?php echo $user->id; ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên</label>
                    <input value="<?php echo $user->name ; ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <p class="alert-danger"><?= $_SESSION['errors']["name"]=(isset($_SESSION['errors']["name"]))?$_SESSION['errors']["name"]:""; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input value="<?php echo $user->email ; ?>" name="email" type="text" class="form-control" id="exampleInputPassword1">
                    <p class="alert-danger"><?= $_SESSION['errors']["email"]=(isset($_SESSION['errors']["email"]))?$_SESSION['errors']["email"]:""; ?></p>
                    <p class="alert-danger"><?= $_SESSION['errors']["issetEmail"]=(isset($_SESSION['errors']["issetEmail"]))?$_SESSION['errors']["issetEmail"]:""; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input name="password" value="<?php echo $user->password ; ?>" type="password" class="form-control" id="exampleInputPassword1">
                    <p class="alert-danger"><?= $_SESSION['errors']["password"]=(isset($_SESSION['errors']["password"]))?$_SESSION['errors']["password"]:""; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                    <input name="numberPhone" value="<?php echo $user->numberPhone ; ?>" type="text" class="form-control" id="exampleInputPassword1">
                    <p class="alert-danger"><?= $_SESSION['errors']["numberPhone"]=(isset($_SESSION['errors']["numberPhone"]))?$_SESSION['errors']["numberPhone"]:""; ?></p>
                    <p class="alert-danger"><?= $_SESSION['errors']["issetPhone"]=(isset($_SESSION['errors']["issetPhone"]))?$_SESSION['errors']["issetPhone"]:""; ?></p>
                </div>
                <button type="submit" class="btn btn-primary w-100">Gửi</button>
            </form>
        </div>
    </div>
</div>
<?php unset($_SESSION["errors"]); ?>