

<?php $__env->startSection('body-content'); ?>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url( <?php echo e(asset('frontend/img/bg-img/40.jpg')); ?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Search News</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<section class="search-result">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center alert alert-warning">
             Search news for '<?php echo e($search); ?>'
            </div>
        </div>
    </div>
</section>

<!-- ##### Main Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    <!-- >>>>>>>>>>>>>>>>>>>>
 Post Left Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">


    </div>
    <!-- >>>>>>>>>>>>>>>>>>>>
 Post Left Sidebar Area END
<<<<<<<<<<<<<<<<<<<<< -->



    <!-- >>>>>>>>>>>>>>>>>>>>
     MIDDLE Posts Area
<<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow search-block">

        <div class="row">

            <!--- left part start -->
            <?php if( $searchnews->count() > 0 ): ?>
            <?php $__currentLoopData = $searchnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <div class="col-md-6 col-12">
                <p>Search result : <?php echo e(count($searchnews)); ?></p>
                <!-- category wise news start -->
                <div class="most-viewed-videos">
                    
                    <div class="single-blog-post d-flex style-3 ">
                        <div class="post-thumbnail">
                            <?php if( $news->image == NULL ): ?>
                            <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                                <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                                <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="post-content">
                            <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" class="post-title"><?php echo e($news->title); ?></a>
                            <p>20 August 2020 01:32 AM</p>
                           
                        </div>
                    </div>
                    
                </div>
                <!-- category wise news end -->
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="col-md-12 text-center alert alert-warning">
                No result found in your search for '<?php echo e($search); ?>'
            </div>
            <?php endif; ?>
            <!--- left part end -->

        </div>

    </div>
    <!-- >>>>>>>>>>>>>>>>>>>>
     MIDDLE Posts Area END
<<<<<<<<<<<<<<<<<<<<< -->



    <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">

    </div>


</section>
<!-- ##### Main Posts Area End ##### -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\rns\resources\views/frontend/pages/search.blade.php ENDPATH**/ ?>