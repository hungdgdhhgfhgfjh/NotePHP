<?php
error_reporting(-1);
ini_set('display_errors', 'On');
?>
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center mt-5 mb-5">Các ghi chú</h1>
        <div class="col-md-8">
            <?php if (isset($_SESSION['flash_message'])) : ?>
                <?php $message = $_SESSION['flash_message']; ?>
                <?php unset($_SESSION['flash_message']); ?>
                <div class="alert alert-success"><i class="fas fa-check"></i> <?= $message ?></div>
            <?php endif; ?>
            <a href="index.php?home=create" class="btn btn-success mt-1" style="width: 100%">Thêm mới</a>
            <form method="POST" action="index.php?controller=note&action=search">
                <div class="row mt-2">
                    <div class="col-3">
                        <select class="form-select" name="type_id">
                            <option value="">Thể loại</option>
                            <?php foreach ($categories as $key => $category) :
                            ?>      
                                    <option value="<?php  $category->id ?>"><?php echo $category->name_categories; ?></option>
                            <?php  endforeach;
                            ?>
                        </select>
                    </div>
                        <div class="col-8">
                            <input class="form-control" type="text" placeholder="Tiêu đề" name="search">
                        </div>
                        <div class="col-1">
                            <button id="search-button" type="button" class="btn btn-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                   
            </form>

            <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table table-striped text-center table-bordered">
                        <tr>
                            <th>STT
                            
                            </th>
                            <th>Tiêu đề
                            </th>
                            <th>Phân loại
                            </th>
                            <th>Tác vụ</th>
                        </tr>
                        <?php if(count($noteUser) === 0): ?>
                         <tr>
                             <td colspan="4" ><b>chưa có</b></td>
                        </tr>
                            <?php endif; ?>
                        <?php  foreach ($noteUser as $key => $note) :   
                        ?>
                        <tr>
                            <td>
                                <?php echo ++$key; 
                                ?>
                            </td>
                            <td>
                                <?php echo  $note->name_note; 
                                ?>
                            </td>
                            <td>
                                <?php echo $note->name_categories;
                                ?>
                            </td>
                            <td>
                                <a href="index.php?home=show&&id=<?php echo $note->id;    
                                                                                    ?>"><i class="far fa-eye fa-lg text-primary"></i></a>
                                <a href="index.php?note=edit&id=<?php echo  $note->id 
                                                                                    ?>"><i class="fas fa-edit fa-lg text-warning"></i></a>
                                <a onclick="return confirm('bạn có muốn xóa') " href="index.php?note=deleteShow&id=<?php echo  $note->id 
                                                                                    ?>">
                                                                                    <i class="fas fa-trash-alt fa-lg text-danger"></i></span></a>
                                <!-- The Modal -->
                                
                            </td>
                        </tr>
                        <?php  endforeach; 
                        ?>
                    </table>
                </div>

                <div>
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination d-flex justify-content-end">
                            <li class="page-item"><a class="page-link" href="index.php?controller=note&action=list&page=<?php  //$param['pre'] 
                                                                                                                        ?>">Previous</a></li>
                            <?php // for ($i = 1; $i <= $param['total_page']; $i++) : 
                            ?>
                            <li class="page-item"><a class="page-link" href="index.php?controller=note&action=list&page=<?php  //$i 
                                                                                                                        ?>"><?php //$i 
                                                                                                                                        ?></a></li>
                            <?php //,kkhv endfor; 
                            ?>
                            <li class="page-item"><a class="page-link" href="index.php?controller=note&action=list&page=<?php //$param['next'] 
                                                                                                                        ?>">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>