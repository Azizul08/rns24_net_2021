

<?php $__env->startSection('header-section'); ?>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<meta property="og:title" content="Rns24" />
<meta property="og:image" content="http://rns24.net/public/frontend/img/logo.JPG" />
<meta property="fb:app_id" content="1238493226503259">


<!-- Favicon -->
<link type="image/gif" rel="shortcut icon" href="<?php echo e(asset('frontend/img/fav.JPG')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body-content'); ?>

<!-- ##### Main Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    
    <?php echo $__env->make('frontend.include.leftcard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- >>>>>>>>>>>>>>>>>>>>
     MIDDLE Posts Area
<<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">


        <!-- category wise news start -->
        <div class="most-viewed-videos mb-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h3><?php echo e($category->name); ?></h3>
                <p><?php echo e($category->description); ?></p>
            </div>

            <div class="row">

                <!-- Single Featured Post -->
                <?php $__currentLoopData = $categorynews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">

                    <div class="single-featured-post">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail mb-50">
                            <?php if( $news->image == NULL ): ?>
                            <a href="<?php echo e(route('newsdetail', $news->id)); ?>">
                                <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('newsdetail', $news->id)); ?>">
                                <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                            </a>
                            <?php endif; ?>
                            <?php if( $news->video != NULL ): ?>
                            <a href="<?php echo e(route('newsdetail', $news->id)); ?>" class="video-play"><i class="fa fa-play"></i></a>
                            <?php endif; ?>
                        </div>
                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="<?php echo e(route('newsdetail', $news->id)); ?>"><?php echo e($news->created_at->toDayDateTimeString()); ?></a>
                                <a href="<?php echo e(route('newsdetail', $news->id)); ?>"><?php echo e($category->name); ?></a>
                            </div>
                            <a href="<?php echo e(route('newsdetail', $news->id)); ?>" class="post-title"><?php echo e($news->title); ?></a>
                        </div>
                    </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Single Featured end -->

            </div>
        </div>
        <!-- category wise news end -->

        <div class="row">
            <div class="col-md-12">
            <?php echo e($categorynews->links()); ?>

            </div>
        </div>

    </div>
    <!-- >>>>>>>>>>>>>>>>>>>>
     MIDDLE Posts Area END
<<<<<<<<<<<<<<<<<<<<< -->


    <?php echo $__env->make('frontend.include.rightcard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</section>
<!-- ##### Main Posts Area End ##### -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\rns24_net\resources\views/frontend/pages/category.blade.php ENDPATH**/ ?>