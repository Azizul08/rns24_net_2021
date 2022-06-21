
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

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="a" class="table table-bordered table-hover text-center align-item-center" >
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">SI</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Title</th>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                            <th scope="col">Action</th>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                            <th scope="col">Action</th>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editor')): ?>
                                            <th scope="col">Action</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody id="adTable">
                                        <?php 
                                            $i = 1 ;
                                        ?>
                                        <?php $__currentLoopData = $pnewses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center" data-id="<?php echo e($news->id); ?>">
                                            <th scope="row"><?php echo e($i); ?></th>
                                            <th scope="row">
                                            <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if( $category->id == $news->category_id ): ?>
                                            <p class="badge badge-danger"><?php echo e($category->name); ?></p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </th>
                                            <th scope="row"><?php echo e($news->title); ?></th>
                                            
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                            <td>
                                                 
                                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#viewnews<?php echo e($news->id); ?>">View</button>
                                                <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="viewnews<?php echo e($news->id); ?>" data-id="<?php echo e($news->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e($news->title); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="row">
                                                                <?php if( $news->image == NULL ): ?>
                                                                <?php else: ?>
                                                                <div class="col-md-6">
                                                                    <div class="news-item">
                                                                        <h5>Image</h5>
                                                                        <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" width="100%" alt="">
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                
                                                                <div class="col-md-6">
                                                                    <?php if( $news->video == NULL ): ?>
                                                                    <p class="badge badge-danger">No video upload</p>
                                                                    <?php else: ?>
                                                                    <iframe src="<?php echo e($news->video); ?>" frameborder="0"></iframe>
                                                                    <?php endif; ?>
                                                                    <?php if( $news->audio == NULL ): ?>
                                                                    <?php else: ?>
                                                                    <div class="news-item">
                                                                        <h5>News audio</h5>
                                                                        <audio src="<?php echo e(asset('audio/'.$news->audio .'/'. $news->audio)); ?>" controls></audio>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Time : <?php echo e($news->created_at->diffForHumans()); ?>  </h5>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Category</h5>
                                                                <p>
                                                                <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( $category->id == $news->category_id ): ?>
                                                                <p class="badge badge-success"><?php echo e($category->name); ?></p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Author</h5>
                                                                <?php $__currentLoopData = App\User::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( $user->id == $news->author_id ): ?>
                                                                <p class="badge badge-success"><?php echo e($user->name); ?></p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Title</h5>
                                                                <p><?php echo e($news->title); ?></p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Description</h5>
                                                                <p><?php echo $news->description; ?></p>
                                                            </div>
                                                            
                                                            <div class="row">

                                                                <div class="col-md-2">
                                                                    <h5>Status</h5>
                                                                    <?php if( $news->status == 0 ): ?>
                                                                    <p class="badge badge-danger">Inactive</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Active</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <h5>Featured?</h5>
                                                                    <?php if( $news->is_featured == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Trend?</h5>
                                                                    <?php if( $news->is_trend == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Pending?</h5>
                                                                    <?php if( $news->is_pending == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-3">
                                                                <h5>Running news?</h5>
                                                                    <?php if( $news->is_running == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                        <form id="editnews" action="<?php echo e(route('pendingnews.update', $news->id )); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="is_pending" value="0">
                                                            <button type="submit" class="btn btn-success " style="margin-left: 10px" >  approve</button>
                                                        </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <button class="btn btn-success edit" data-toggle="modal" data-target="#editnews<?php echo e($news->id); ?>">Edit</button>
                                                <div class="modal fade bd-example-modal-lg" id="editnews<?php echo e($news->id); ?>" data-id="<?php echo e($news->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e($news->title); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <form action="<?php echo e(route('pnews.update', $news->id)); ?>" method="POST" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" class="form-control" name="title" required value="<?php echo e($news->title); ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea type="text" id="one-ckeditor" class="form-control" name="description" required ><?php echo e($news->description); ?></textarea>
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
                                                                                <iframe src="<?php echo e($news->video); ?>" style="width: 100%" frameborder="0"></iframe>
                                                                                <?php endif; ?>
                                                                                
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Upload News Audio</label> <br>
                                                                                <?php if( $news->audio == NULL ): ?>
                                                                                <p class="badge badge-danger">No audio upload</p>
                                                                                <?php else: ?>
                                                                                <audio style="width: 100%" src="<?php echo e(asset('audio/' . $news->audio .'/'. $news->audio)); ?>" controls></audio>
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
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                            <td>
                                            
                                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#viewnews<?php echo e($news->id); ?>">View</button>
                                                <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="viewnews<?php echo e($news->id); ?>" data-id="<?php echo e($news->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e($news->title); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="row">
                                                                <?php if( $news->image == NULL ): ?>
                                                                <?php else: ?>
                                                                <div class="col-md-6">
                                                                    <div class="news-item">
                                                                        <h5>Image</h5>
                                                                        <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" width="100%" alt="">
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                
                                                                <div class="col-md-6">
                                                                   <?php if( $news->video == NULL ): ?>
                                                                    <p class="badge badge-danger">No video upload</p>
                                                                    <?php else: ?>
                                                                    <iframe src="<?php echo e($news->video); ?>" frameborder="0"></iframe>
                                                                    <?php endif; ?>
                                                                    <?php if( $news->audio == NULL ): ?>
                                                                    <?php else: ?>
                                                                    <div class="news-item">
                                                                        <h5>News audio</h5>
                                                                        <audio src="<?php echo e(asset('audio/'.$news->audio .'/'. $news->audio)); ?>" controls></audio>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Time : <?php echo e($news->created_at->diffForHumans()); ?>  </h5>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Category</h5>
                                                                <p>
                                                                <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( $category->id == $news->category_id ): ?>
                                                                <p class="badge badge-success"><?php echo e($category->name); ?></p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Author</h5>
                                                                <?php $__currentLoopData = App\User::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( $user->id == $news->author_id ): ?>
                                                                <p class="badge badge-success"><?php echo e($user->name); ?></p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Title</h5>
                                                                <p><?php echo e($news->title); ?></p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Description</h5>
                                                                <p><?php echo $news->description; ?></p>
                                                            </div>
                                                            
                                                            <div class="row">

                                                                <div class="col-md-2">
                                                                    <h5>Status</h5>
                                                                    <?php if( $news->status == 0 ): ?>
                                                                    <p class="badge badge-danger">Inactive</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Active</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <h5>Featured?</h5>
                                                                    <?php if( $news->is_featured == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Trend?</h5>
                                                                    <?php if( $news->is_trend == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Pending?</h5>
                                                                    <?php if( $news->is_pending == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-3">
                                                                <h5>Running news?</h5>
                                                                    <?php if( $news->is_running == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <button class="btn btn-success edit" data-toggle="modal" data-target="#editnews<?php echo e($news->id); ?>">Edit</button>
                                                <div class="modal fade bd-example-modal-lg" id="editnews<?php echo e($news->id); ?>" data-id="<?php echo e($news->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e($news->title); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <form action="<?php echo e(route('pnews.update', $news->id)); ?>" method="POST" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" class="form-control" name="title" required value="<?php echo e($news->title); ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea type="text" id="one-ckeditor" class="form-control" name="description" required ><?php echo e($news->description); ?></textarea>
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
                                                                                <iframe style="width:100%" src="<?php echo e($news->video); ?>" frameborder="0"></iframe>
                                                                                <?php endif; ?>
                                                                                
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Upload News Audio</label> <br>
                                                                                <?php if( $news->audio == NULL ): ?>
                                                                                <p class="badge badge-danger">No audio upload</p>
                                                                                <?php else: ?>
                                                                                <audio style="width:100%" src="<?php echo e(asset('audio/' . $news->audio .'/'. $news->audio)); ?>" controls></audio>
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
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                            </td>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editor')): ?>
                                            <td>
                                            
                                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#viewnews<?php echo e($news->id); ?>">View</button>
                                                <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="viewnews<?php echo e($news->id); ?>" data-id="<?php echo e($news->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e($news->title); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="row">
                                                                <?php if( $news->image == NULL ): ?>
                                                                <?php else: ?>
                                                                <div class="col-md-6">
                                                                    <div class="news-item">
                                                                        <h5>Image</h5>
                                                                        <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" width="100%" alt="">
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                
                                                                <div class="col-md-6">
                                                                   <?php if( $news->video == NULL ): ?>
                                                                    <p class="badge badge-danger">No video upload</p>
                                                                    <?php else: ?>
                                                                    <iframe src="<?php echo e($news->video); ?>" frameborder="0"></iframe>
                                                                    <?php endif; ?>
                                                                    <?php if( $news->audio == NULL ): ?>
                                                                    <?php else: ?>
                                                                    <div class="news-item">
                                                                        <h5>News audio</h5>
                                                                        <audio src="<?php echo e(asset('audio/'.$news->audio .'/'. $news->audio)); ?>" controls></audio>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Time : <?php echo e($news->created_at->diffForHumans()); ?>  </h5>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Category</h5>
                                                                <p>
                                                                <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( $category->id == $news->category_id ): ?>
                                                                <p class="badge badge-success"><?php echo e($category->name); ?></p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Author</h5>
                                                                <?php $__currentLoopData = App\User::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( $user->id == $news->author_id ): ?>
                                                                <p class="badge badge-success"><?php echo e($user->name); ?></p>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Title</h5>
                                                                <p><?php echo e($news->title); ?></p>
                                                            </div>
                                                            <div class="news-item">
                                                                <h5>Description</h5>
                                                                <p><?php echo $news->description; ?></p>
                                                            </div>
                                                            
                                                            <div class="row">

                                                                <div class="col-md-2">
                                                                    <h5>Status</h5>
                                                                    <?php if( $news->status == 0 ): ?>
                                                                    <p class="badge badge-danger">Inactive</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Active</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <h5>Featured?</h5>
                                                                    <?php if( $news->is_featured == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Trend?</h5>
                                                                    <?php if( $news->is_trend == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                <h5>Pending?</h5>
                                                                    <?php if( $news->is_pending == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="col-md-3">
                                                                <h5>Running news?</h5>
                                                                    <?php if( $news->is_running == 0 ): ?>
                                                                    <p class="badge badge-danger">No</p>
                                                                    <?php else: ?>
                                                                    <p class="badge badge-success">Yes</p>
                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                                
                                            </td>
                                            <?php endif; ?>
                                           
                                            
                                            
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
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\rns\resources\views/backend/pages/news/pending.blade.php ENDPATH**/ ?>