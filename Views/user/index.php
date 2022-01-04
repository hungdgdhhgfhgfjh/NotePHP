<h1 class="text-center text-warning">Khách hàng</h1>
<a href="index.php?staffs=create" class="btn btn-warning">thêm</a>
<a class="btn btn-warning"  href="index.php?staffs=index">Nhân viên</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên</th>
      <th scope="col">Email</th>
      <th scope="col">xem</th>
      <th scope="col">Thay đổi</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody>
      <?php  foreach($users as $key => $user): ?>
    <tr>
     <th><?= $user->id;  ?></th>
     <th><?= $user->name;  ?></th>
     <th><?= $user->email;  ?></th>
     <th> <a href="index.php?users=show&&id=<?php echo $user->id;    
                                                                                    ?>"><i class="far fa-eye fa-lg text-primary"></i></a></th>
     <th><a class="btn btn-warning" href="index.php?users=edit&&id=<?= $user->id; ?>">edit</a></th>
     <th><a class="btn btn-danger" href="index.php?users=deleteShow&&id=<?= $user->id; ?>">delete</a></th>
    </tr>
    <?php  endforeach; ?>
  </tbody>
</table>