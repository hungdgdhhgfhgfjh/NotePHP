<div class="container-fluid">
    <h1 class="text-center mt-5">Thêm mới ghi chú</h1>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-6">
            <form method="post" action="index.php?home=storeNote">

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label class="fw-bold">Phân loại</label>
                    </div>
                    <div class="col-md-10">
                            <?php if( !isset($_SESSION["user"]) ):  ?>
                                <select name="name_categories" class="form-select">
                                <?php foreach ($categories as $key => $category) :
                            ?>
                  
                                    <option value="<?=  $category->name_categories ?>"><?php echo $category->name_categories; ?></option>
                            <?php  endforeach; ?>
                                </select>
                              <?php else: ?>
                                <select name="category_id" class="form-select">
                            <?php foreach ($categories as $key => $category) :
                            ?>
                                    <option value="<?=  $category->id ?>"><?php echo $category->name_categories; ?></option>
                            <?php  endforeach;
                            ?>
                            <?php endif; ?>   
                            </select>
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label class="fw-bold">Tiêu đề</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control"  name="name_note">
                        <p class="text-danger"><?= (isset($_SESSION['errors']['title'])) ? $_SESSION['errors']['title'] : ''; ?></p>
                    </div>
                </div>
                <p class="alert-danger"><?= $_SESSION['errors']["name_note"] = (isset($_SESSION['errors']["name_note"])) ? $_SESSION['errors']["name_note"] : ""; ?></p>

                <div class="row form-group mt-2">
                    <div class="col-md-2">
                        <label class="fw-bold">Nội dung</label>
                    </div>
                    <div class="col-md-10">
                        <textarea type="text" class="form-control <?= (isset($_SESSION['errors']['content'])) ? 'is-invalid' : ''; ?>" name="note_Content" rows="6"></textarea>
                        <p class="alert-danger"><?= $_SESSION['errors']["note_Content"] = (isset($_SESSION['errors']["note_Content"])) ? $_SESSION['errors']["note_Content"] : ""; ?></p>

                    </div>
                </div>

                <div class="row form-group mt-2 justify-content-end">
                    <div class="col-md-10">
                        <input type="submit" value="Lưu" class="btn btn-primary">
                        <a href="index.php?controller=note&action=list" class="btn btn-secondary">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php unset($_SESSION["errors"]); ?>
