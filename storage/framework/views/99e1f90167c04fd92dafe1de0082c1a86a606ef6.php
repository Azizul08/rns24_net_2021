
<?php $__env->startSection('per_page_css'); ?>
<link href="<?php echo e(asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('per_page_js'); ?>
<script src="<?php echo e(asset('backend/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script>
    $("#a").DataTable();
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_card_content'); ?>

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">All News</h4>
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
                            <!-- add message -->
                            <?php if( session()->has('create') ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> <?php echo e(session()->get('create')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                            
                            <?php if($errors->any()): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e($error); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <!-- update message -->
                            <?php if( session()->has('update') ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> <?php echo e(session()->get('update')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>

                             <!-- delete message -->
                             <?php if( session()->has('delete') ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> <?php echo e(session()->get('delete')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>

                            <!-- delete message -->
                            <?php if( session()->has('passnotmatch') ): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> <?php echo e(session()->get('passnotmatch')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>

                            <!-- create failed message -->
                            <?php if( session()->has('createFailed') ): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> <?php echo e(session()->get('createFailed')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addnews">Add News</button>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg " id="addnews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('news.store')); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                                <input type="hidden" class="form-control" name="author_id" value="<?php echo e(Auth::user()->id); ?>" required >
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="div_editor1" name="description" >
                                                        
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>References</label>
                                                    <input type="text" class="form-control" name="ref" >
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-3 text-left">
                                                        <label>Status</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this featured news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this trending news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="one" value="1" >
                                                                <label class="form-check-label" for="one">
                                                                    Yes
                                                                </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="two" value="0" checked>
                                                                <label class="form-check-label" for="two">
                                                                No
                                                                </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this running news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="1" >
                                                            <label class="form-check-label" for="three">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="0" checked>
                                                            <label class="form-check-label" for="three">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3 text-left" style="margin-top: 15px;">
                                                        <label>Is this breaking news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="breaking" id="four" value="1" >
                                                            <label class="form-check-label" for="four">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="breaking" id="four" value="0" checked>
                                                            <label class="form-check-label" for="four">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Select Category</label>
                                                    <select name="category_id" class="form-control" required>
                                                    <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Image</label> <br>
                                                            <img src="<?php echo e(asset('images/image-preview.png')); ?>" id="image_preview_container" width="100px" alt=""> <br> <br>
                                                            <input type="file" id="image" class="form-control-file" name="image">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>You tube video link</label>
                                                            <input type="text" name="video"  class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Audio</label>
                                                            <input type="file" name="audio" id="audio" class="form-control-file">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addnewsadmin">Add News</button>
                            <div class="modal fade bd-example-modal-lg " id="addnewsadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('news.storeadmin')); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                                <input type="hidden" class="form-control" name="author_id" value="<?php echo e(Auth::user()->id); ?>" required >
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea type="text" id="one-ckeditor" class="form-control" name="description" required > </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>References</label>
                                                    <input type="text" class="form-control" name="ref" >
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-3 text-left">
                                                        <label>Status</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this featured news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" value="1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="featured" id="exampleRadios2" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this trending news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="one" value="1" >
                                                                <label class="form-check-label" for="one">
                                                                    Yes
                                                                </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="trending" id="two" value="0" checked>
                                                                <label class="form-check-label" for="two">
                                                                No
                                                                </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 text-left">
                                                        <label>Is this running news?</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="1" >
                                                            <label class="form-check-label" for="three">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="running" id="three" value="0" checked>
                                                            <label class="form-check-label" for="three">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="is_pending" value="1">

                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Select Category</label>
                                                    <select name="category_id" class="form-control" required>
                                                    <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Image</label> <br>
                                                            <img src="<?php echo e(asset('images/image-preview.png')); ?>" id="image_preview_container" width="100px" alt=""> <br> <br>
                                                            <input type="file" id="image" class="form-control-file" name="image">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>You tube video link</label>
                                                            <input type="text" name="video"  class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload News Audio</label>
                                                            <input type="file" name="audio" id="audio" class="form-control-file">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!-- add row end -->

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="a" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">SI</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1 ;
                                        ?>
                                        <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo e($i); ?></th>
                                            <th scope="row">
                                            <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if( $category->id == $news->category_id ): ?>
                                            <p class="badge badge-danger"><?php echo e($category->name); ?></p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </th>
                                            <th scope="row"><?php echo e($news->title); ?></th>
                                            

                                            
                                            <td>
                                                 
                                                
                                                <a href="<?php echo e(route('news.edit', $news->id)); ?>" target="blank" class="btn btn-primary">Edit</a>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletenews<?php echo e($news->id); ?>">Delete</button>
                                                <?php endif; ?>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deletenews<?php echo e($news->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete "<?php echo e($news->title); ?>" ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?php echo e(route('news.delete', $news->id)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="btn btn-success">Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            
                                        </tr>
                                        <?php 
                                            $i++ ;
                                        ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- manage row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rns24/public_html/resources/views/backend/pages/news/manage.blade.php ENDPATH**/ ?>