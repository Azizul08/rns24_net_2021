<!-- >>>>>>>>>>>>>>>>>>>>
Post Left Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
<div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">

<!-- Recent upload news Widget start -->
<div class="single-sidebar-widget p-30">
    <!-- Section Title -->
    <div class="section-heading">
        <?php
        $i = 0;
        ?>
        <?php $__currentLoopData = App\Models\Backend\Title\Title::orderBy('id','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if( $i == 0 ): ?>
        <h5>
        <?php echo e($title->title); ?>

        </h5>
        <?php endif; ?>
        <?php
        $i--;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Single Blog Post -->
    <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->take(25)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="single-blog-post d-flex">
        <div class="post-thumbnail">
            <?php if( $news->image == NULL ): ?>
            <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" target="blank">
                <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
            </a>
            <?php else: ?>
            <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" target="blank">
                <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
            </a>
            <?php endif; ?>  
        </div>
        <div class="post-content">
                <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" class="post-title"><?php echo e(Str::limit($news->title,30)); ?></a>
                <div class="post-meta d-flex justify-content-between">
                    <!-- <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Single Blog Post end-->

</div>
<!-- Recent upload news Widget end -->


    <!-- Magazine Widget start -->
    <div class="single-sidebar-widget">
        <?php
        $i = 0;
        ?>
        <?php $__currentLoopData = App\Models\Backend\Ad\Ad::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if( $i == 0 ): ?>
        <a href="<?php echo e($ad->link); ?>" class="add-img"><img src="<?php echo e(asset('images/ad/'. $ad->image)); ?>" alt=""></a>
        <?php endif; ?>
        <?php
        $i--;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- Magazine Widget end -->

    <!-- Running news Widget start -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <?php
            $i = 4;
            ?>
            <?php $__currentLoopData = App\Models\Backend\Title\Title::orderBy('id','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( $i == 0 ): ?>
            <h5>
            <?php echo e($title->title); ?>

            </h5>
            <?php endif; ?>
            <?php
            $i--;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Single Blog Post -->
        <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->where('is_running',1)->take(25)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-blog-post d-flex">
            <div class="post-thumbnail">
                <?php if( $news->image == NULL ): ?>
                <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" target="blank">
                    <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                </a>
                <?php else: ?>
                <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" target="blank">
                    <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                </a>
                <?php endif; ?>
                    
            </div>
            <div class="post-content">
                <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" class="post-title"><?php echo e($news->title); ?></a>
                <div class="post-meta d-flex justify-content-between">
                    <!-- <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Single Blog Post end-->
    

    </div>
    <!-- Running news Widget end -->

</div>
<!-- >>>>>>>>>>>>>>>>>>>>
Post Left Sidebar Area END
<<<<<<<<<<<<<<<<<<<<< --><?php /**PATH D:\xampp\htdocs\rns24_net_2021\resources\views/frontend/include/leftcard.blade.php ENDPATH**/ ?>