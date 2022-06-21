
<?php $__env->startSection('per_page_css'); ?>
<link href="<?php echo e(asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('per_page_js'); ?>
<script src="<?php echo e(asset('backend/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script>
    $("#about").DataTable();
    $("#team").DataTable();
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_card_content'); ?>

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">About Page</h4>
        </div>
    </div>
    <!-- title row end -->

    <!-- about information card card start -->
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

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Manage about information</h5>
                        </div>
                    </div>

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="about" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Information</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1 ;
                                        ?>
                                        <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo e($i); ?></th>
                                            <td>
                                                <img src="<?php echo e(asset('images/about/' . $about->image )); ?>" class="img-fluid" width="50px"  alt="">
                                            </td>
                                            <td><?php echo Str::limit($about->info,100); ?></td>
                                            <td>

                                                <!-- edit modal start -->
                                                <a class="btn btn-primary" href="<?php echo e(route('about.edit', $about->id )); ?>">Edit</a>

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
    <!-- about information card card end -->














    <!-- team member card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <h5>Manage Team Member</h5>
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addteam">Add Team Member</button>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addteam">Add Team Member</button>
                            <?php endif; ?>
                            <!-- Modal -->
                            <div class="modal fade" id="addteam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Team Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('team.store')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label >Name*</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Designation*</label>
                                                <input type="text" class="form-control" name="designation">
                                            </div>
                                            <div class="form-group">
                                                <label >Description</label>
                                                <textarea name="description" rows="3" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Image </label> <br>
                                                <img src="<?php echo e(asset('images/image-preview.png')); ?>" id="image_preview_container" width="100px" alt=""> <br> <br>
                                                <input type="file" id="image" class="form-control-file" name="image" required>
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
                        </div>
                    </div>
                    <!-- add row end -->

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="team" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1 ;
                                        ?>
                                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo e($i); ?></th>
                                            <td>
                                                <img src="<?php echo e(asset('images/team/' . $team->image )); ?>" class="img-fluid" width="50px"  alt="">
                                            </td>
                                            <td><?php echo e($team->name); ?></td>
                                            <td><?php echo e($team->designation); ?></td>
                                            <td>

                                                <button class="btn btn-primary" data-toggle="modal" data-target="#editteam<?php echo e($team->id); ?>">Edit</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="editteam<?php echo e($team->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Team Member</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(route('team.update', $team->id)); ?>" method="POST" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label >Name*</label>
                                                                    <input type="text" class="form-control" name="name" required value="<?php echo e($team->name); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Designation*</label>
                                                                    <input type="text" class="form-control" name="designation" value="<?php echo e($team->designation); ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Description</label>
                                                                    <textarea name="description" rows="3" class="form-control"><?php echo e($team->description); ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Upload Image </label> <br>
                                                                    <img src="<?php echo e(asset('images/team/'. $team->image )); ?>"  width="150px" alt=""> <br> <br>
                                                                    <input type="file" id="image" class="form-control-file" name="image">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- delete modal -->
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#deleteteam<?php echo e($team->id); ?>">Delete</button>
                                                <?php endif; ?>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteteam<?php echo e($team->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Team Member</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?php echo e(route('team.delete', $team->id)); ?>" method="post">
                                                                <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success" >Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
    <!-- team member card end -->

</div>
<!-- container end-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel Project\rns\resources\views/backend/pages/about/manage.blade.php ENDPATH**/ ?>