<!DOCTYPE html>
<html lang="en">

    <head>
        <?php echo $__env->yieldContent('header-section'); ?>
        <?php echo $__env->make('frontend.include.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body>
        
        
        


        <?php echo $__env->make('frontend.include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- text slide start -->
        <marquee behavior="" direction="" class="text-slide">
            <ul>
            <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_delete',0)->where('status',1)->where('is_breakingNews',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('newsdetail', $news->slug)); ?>"><?php echo e($news->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </marquee>
        <!-- text slide end -->

        <?php echo $__env->yieldContent('body-content'); ?>    

        <?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.include.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    </body>

</html><?php /**PATH D:\rns24_net_2021\resources\views/frontend/template/layout.blade.php ENDPATH**/ ?>