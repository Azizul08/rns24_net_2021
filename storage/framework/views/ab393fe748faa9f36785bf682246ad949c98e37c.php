
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
            <h4 class="page-title">Edit user</h4>
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
                            <!-- reset failed message -->
                            <?php if( session()->has('resetfailed') ): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Sorry!</strong> <?php echo e(session()->get('resetfailed')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                            
                             <!-- reset success message -->
                            <?php if( session()->has('reset') ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulations!</strong> <?php echo e(session()->get('reset')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo e(route('user.update', $user->id )); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="name" required value="<?php echo e($user->name); ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required value="<?php echo e($user->email); ?>">
                        </div>
                        <div class="form-group">
                            <label>Please select user role</label>
                            <?php if( $roles->count() > 0 ): ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( $role->id != 1 ): ?>
                                <div class="form-check">
                                    <input 
                                    type="radio"
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($rol->id == $role->id): ?>
                                            checked
                                        <?php endif; ?>
                                        <?php if( $role->id == 1 ): ?>
                                        disabled
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    name="roles[]" value="<?php echo e($role->id); ?>">
                                    <label> <?php echo e($role->name); ?></label>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div class="alert alert-warning">Please add user role first</div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                        </div>
                    </div>
                    
                    <!-- change password start -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                    <div class="row changepass">
                        <div class="col-md-12">
                            <form action="<?php echo e(route('password.reset', $user->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
    
                                <div class="form-group">
                                    <input type="password" placeholder="Enter New password" name="password" class="form-control" required="">
                                </div>
    
                                <div class="form-group">
                                    <input type="password" placeholder="Re-Enter New password" name="cpassword" class="form-control" required="">
                                </div>
    
                                <button type="submit" class="btn btn-success">Reset Password</button>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- change password end -->
                </div>
                
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rns24/public_html/resources/views/backend/pages/user/edit.blade.php ENDPATH**/ ?>