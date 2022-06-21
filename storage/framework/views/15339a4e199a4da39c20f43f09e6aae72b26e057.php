<!-- >>>>>>>>>>>>>>>>>>>>
Post Right Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
<div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Social Followers Info -->
        <div class="social-followers-info">
            <!-- Facebook -->
            <?php $__currentLoopData = App\Models\Backend\Contact\Contact::orderBy('id','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($contact->f_link); ?>" class="facebook-fans"><i class="fa fa-facebook"></i> </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    
    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Categories</h5>
        </div>

        <!-- Catagory Widget -->
        <ul class="catagory-widgets">

            <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->get() ) > 0 ): ?>
            <li>
                <a href="<?php echo e(route('category.show', $category->slug)); ?>">
                    <span>
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo e($category->name); ?>

                    </span> 
                    <span>
                    <?php echo e(count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->where('status',1)->where('is_pending',0)->get() )); ?>

                    </span>
                </a>
            </li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>

<!-- Sidebar Widget -->
<div class="single-sidebar-widget">
    <?php
    $i = 1;
    ?>
    <?php $__currentLoopData = App\Models\Backend\Ad\Ad::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if( $i == 0 ): ?>
    <a href="#" class="add-img"><img src="<?php echo e(asset('images/ad/'. $ad->image)); ?>" alt=""></a>
    <?php endif; ?>
    <?php
    $i--;
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>



<!-- Recent upload news Widget start -->
<div class="single-sidebar-widget p-30">
    <!-- Section Title -->
    <div class="section-heading">
        <h5>Trending News</h5>
    </div>

    <!-- Single Blog Post -->
    <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->where('is_trend',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Single Blog Post end-->

</div>
<!-- Recent upload news Widget end -->
        

</div>
<!-- >>>>>>>>>>>>>>>>>>>>
Post Right Sidebar Area END
<<<<<<<<<<<<<<<<<<<<< --><?php /**PATH C:\xampp\htdocs\laravel Project\rns\resources\views/frontend/include/rightcard.blade.php ENDPATH**/ ?>