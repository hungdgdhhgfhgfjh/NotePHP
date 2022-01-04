<div class="container">
    <h1 class="text-center">Ghi chú</h1>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <h4><?= $note->name_note; ?></h4>
            <b class="mt-2">Nội dung</b>
            <div class="col-md-12 mt-4 p-2 border rounded" style='background-color:burlywood; min-height: 100px;'>
                <p><?php echo $note->note_Content; ?></p>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="index.php?note=edit&&id=<?php echo $note->id ?>" class="btn btn-warning">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ko ?')" href="index.php?controller=note&action=delete&id=<?= $param['item']->id ?>" class="btn btn-danger">Xóa</a>
                </div>
                <div class="col-md-6 text-end">
                    <a href="index.php?home=home" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>