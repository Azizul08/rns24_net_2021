
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
                            <?php if( session()->has('restored') ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congratulation!</strong> <?php echo e(session()->get('restored')); ?>

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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#restore_all">Restore All News</button>
                            <?php endif; ?>
                            <!-- Modal -->
                            <div class="modal fade" id="restore_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Restore All news ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo e(route('news.restore.all')); ?>" class="btn btn-success">Yes</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletenews<?php echo e($news->id); ?>">Restore</button>
                                                <?php endif; ?>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deletenews<?php echo e($news->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Restore this news ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?php echo e(route('news.restore', $news->id)); ?>" method="POST">
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
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rns24/public_html/resources/views/backend/pages/news/deletednews.blade.php ENDPATH**/ ?>