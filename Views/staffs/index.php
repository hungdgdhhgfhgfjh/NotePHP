<h1 class="text-center text-warning">Nhân viên</h1>
<a href="index.php?staffs=create" class="btn btn-warning">thêm</a>
<a class="btn btn-warning" href="index.php?users=index">Khách hàng</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên</th>
      <th scope="col">Chức vụ</th>
      <th scope="col">xem</th>
      <th scope="col">Thay đổi</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody>
      <?php  foreach($staffs as $key => $staff): ?>
    <tr>
     <th><?= $staff->id;  ?></th>
     <th><?= $staff->name;  ?></th>
     <th><?= $staff->position;  ?></th>
     <th> <a href="index.php?staffs=show&&id=<?php echo $staff->id;    
                                                                                    ?>"><i class="far fa-eye fa-lg text-primary"></i></a></th>
     <th><a class="btn btn-warning" href="index.php?staffs=edit&&id=<?= $staff->id; ?>">edit</a></th>
     <th><a class="btn btn-danger" href="index.php?staffs=deleteShow&&id=<?= $staff->id; ?>">delete</a></th>
    </tr>
    <?php  endforeach; ?>
  </tbody>
</table>