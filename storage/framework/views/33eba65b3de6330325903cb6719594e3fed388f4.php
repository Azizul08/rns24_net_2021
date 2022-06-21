
<?php $__env->startSection('per_page_css'); ?>
<link href="<?php echo e(asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('per_page_js'); ?>
<script src="<?php echo e(asset('backend/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script>
    $("#user").DataTable();
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_card_content'); ?>

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit this news "<?php echo e($news->title); ?>"</h4>
        </div>
    </div>
    <!-- title row end -->

    <!-- main card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- update message -->
                            <?php if( session()->has('update') ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> <?php echo e(session()->get('update')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                
                            <!-- update password failed -->
                            <?php if( session()->has('oldpassnotmatch') ): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> <?php echo e(session()->get('oldpassnotmatch')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                
                            <!-- new password not matched -->
                            <?php if( session()->has('updatePassNotMatch') ): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> <?php echo e(session()->get('updatePassNotMatch')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                
                            <!-- password update message -->
                            <?php if( session()->has('passupdatesuccess') ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> <?php echo e(session()->get('passupdatesuccess')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                
                            <!-- account delete failed message -->
                            <?php if( session()->has('deleteFailed') ): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> <?php echo e(session()->get('deleteFailed')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form action="<?php echo e(route('news.update', $news->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" required value="<?php echo e($news->title); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" id="div_editor1"  class="form-control" name="description" required ><?php echo e($news->description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>References</label>
                                        <input type="text" class="form-control" name="ref" value="<?php echo e($news->ref); ?>">
                                    </div>

                                    <div class="row">

                                        <div class="col-md-3 text-left">
                                            <label>Status</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" 
                                                <?php if( $news->status == 1  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="1">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" 
                                                <?php if( $news->status == 0  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="0" >
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 text-left">
                                            <label>Is this featured news?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" 
                                                <?php if( $news->is_featured == 1  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="1">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="featured" id="exampleRadios2" 
                                                <?php if( $news->is_featured == 0  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="0" >
                                                <label class="form-check-label" for="exampleRadios2">
                                                    No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 text-left">
                                            <label>Is this trending news?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trending" id="one" 
                                                <?php if( $news->is_trend == 1  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="1" >
                                                    <label class="form-check-label" for="one">
                                                        Yes
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trending" id="two" 
                                                <?php if( $news->is_trend == 0  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="0" >
                                                    <label class="form-check-label" for="two">
                                                    No
                                                    </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 text-left">
                                            <label>Is this running news?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="running" id="three" 
                                                <?php if( $news->is_running == 1  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="1" >
                                                <label class="form-check-label" for="three">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="running" id="three" 
                                                <?php if( $news->is_running == 0  ): ?>
                                                checked
                                                <?php endif; ?>
                                                value="0" >
                                                <label class="form-check-label" for="three">
                                                    No
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" class="form-control" required>
                                        <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option 
                                        <?php if( $news->category_id == $category->id  ): ?>
                                        selected
                                        <?php endif; ?>
                                        value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Upload News Image</label> <br>
                                                <?php if( $news->image == NULL ): ?>
                                                <p class="badge badge-danger">No image upload</p>
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" width="100px" alt=""> <br> <br>
                                                <?php endif; ?>
                                                <input type="file" id="image" class="form-control-file" name="image">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Upload News Video</label>
                                                <input type="text" name="video"  class="form-control" value="<?php echo e($news->video); ?>"> <br>
                                                <?php if( $news->video == NULL ): ?>
                                                <p class="badge badge-danger">No video upload</p>
                                                <?php else: ?>
                                                <iframe src="<?php echo e($news->video); ?>" frameborder="0"></iframe>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Upload News Audio</label> <br>
                                                <?php if( $news->audio == NULL ): ?>
                                                <p class="badge badge-danger">No audio upload</p>
                                                <?php else: ?>
                                                <audio src="<?php echo e(asset('audio/' . $news->audio .'/'. $news->audio)); ?>" controls></audio>
                                                <?php endif; ?>
                                                <input type="file" name="audio" id="audio" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel Project\rns\resources\views/backend/pages/news/edit.blade.php ENDPATH**/ ?>