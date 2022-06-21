
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
            <h4 class="page-title">Edit <?php echo e($user->name); ?>'s profile</h4>
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

                    <form action="<?php echo e(route('profile.update', $user->id )); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label >Upload your profile image</label> <br> 
                            <?php if( $user->image == NULL ): ?>
                            <img src="<?php echo e(asset('images/profile/user.png')); ?>" width="150px" alt=""> <br> <br>
                            <?php else: ?>
                            <img src="<?php echo e(asset('images/profile/'. $user->image)); ?>" width="150px" alt=""> <br> <br>
                            <?php endif; ?>
                            <input type="file" class="form-control-file"  name="image">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="name" required value="<?php echo e($user->name); ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required value="<?php echo e($user->email); ?>">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                    <!-- change password start -->
                    <div class="row changepass">
                        <div class="col-md-12">
                            <form action="<?php echo e(route('updatePassword', $user->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <input type="password" placeholder="Enter Old password" name="oldpassword" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="Enter New password" name="newpassword" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="Re-Enter New password" name="cnewpassword" class="form-control" required="">
                                </div>

                                <button type="submit" class="btn btn-success">Change Password</button>
                            </form>
                        </div>
                    </div>
                    <!-- change password end -->

                    <!-- delete account modal -->
                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $rol->id == 1 ): ?>
                    <?php else: ?>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccount<?php echo e($user->id); ?>">
                                Delete Account
                            </button>
                            <div class="modal fade" id="deleteAccount<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are You sure Want to delete account?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?php echo e(route('profile.delete', $user->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>

                                                <div class="form-group">
                                                    <input type="password" placeholder="Enter Your Passowrd" name="password" class="form-control" required="">
                                                </div>

                                                <div class="form-group text-right">
                                                    <button type="submit" class="btn btn-success ">Delete</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- delete account modal -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\rns24_net_2021\resources\views/backend/pages/user/editProfile.blade.php ENDPATH**/ ?>