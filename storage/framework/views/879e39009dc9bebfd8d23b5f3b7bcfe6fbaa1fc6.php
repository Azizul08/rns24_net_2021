
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
            <h4 class="page-title">Manage user</h4>
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

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#adduser">Add user</button>
                            <?php endif; ?>
                            <!-- Modal -->
                            <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New user</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('user.create')); ?>" method="POST" >
                                            <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="name" required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control" name="cpassword" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Please select user role</label>
                                                    <?php if( $roles->count() > 0 ): ?>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check">
                                                            <input 
                                                            <?php if( $role->id == 1 ): ?>
                                                            disabled
                                                            <?php endif; ?>
                                                            type="radio" name="roles[]" value="<?php echo e($role->id); ?>">
                                                            <label> <?php echo e($role->name); ?></label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    <div class="alert alert-warning">Please add user role first</div>
                                                    <?php endif; ?>
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
                                <table id="user" class="table table-bordered table-hover text-center align-item-center">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                        <th scope="col">Action</th>
                                        <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1 ;
                                        ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo e($i); ?></th>
                                            <th scope="row"><?php echo e($user->name); ?></th>
                                            <th scope="row"><?php echo e($user->email); ?></th>
                                            <th scope="row"><?php echo e(implode(',', $user->roles()->get()->pluck('name')->toArray() )); ?></th>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                            <td>

                                                <!-- edit modal start -->
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                                    <a class="btn btn-primary" href="<?php echo e(route('user.edit', $user->id)); ?>">Edit</a>
                                                <?php endif; ?>
                                                

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if( $rol->id == 1 ): ?>
                                                <?php else: ?>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteuser<?php echo e($user->id); ?>">Delete</button>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteuser<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete "<?php echo e($user->name); ?>" ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?php echo e(route('user.delete', $user->id)); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="btn btn-success">Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rns24/public_html/resources/views/backend/pages/user/manage.blade.php ENDPATH**/ ?>