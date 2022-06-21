
<?php $__env->startSection('main_card_content'); ?>
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    
    <div class="row">

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="<?php echo e(route('pendingnews.show')); ?>">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                           
                        </h6>
                        <h6 class="text-white">Total Pending News</h6>
                        <h6 class="text-white"><?php echo e(count(App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',1)->get() )); ?></h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="<?php echo e(route('news.show')); ?>">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                           
                        </h6>
                        <h6 class="text-white">Total News</h6>
                        <h6 class="text-white"><?php echo e(count(App\Models\Backend\News\News::orderBy('id','desc')->where('status',1)->where('is_delete',0)->get() )); ?></h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="<?php echo e(route('message.show')); ?>">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                           
                        </h6>
                        <h6 class="text-white">Total Message</h6>
                        <h6 class="text-white"><?php echo e(count(App\Models\Frontend\Message::orderBy('id','desc')->get() )); ?></h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
       
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel Project\rns\resources\views/backend/pages/home.blade.php ENDPATH**/ ?>