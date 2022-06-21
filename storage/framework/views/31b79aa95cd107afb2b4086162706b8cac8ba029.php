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
    
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Newsletter</h5>
        </div>

        <div class="newsletter-form">
            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
            <form id="newsletterForm">
                <input type="email" name="email" placeholder="Enter your email">
                <button type="submit" class="btn mag-btn w-100">Subscribe</button>
            </form>
            <a class="facebook-button" href="https://rns24.net/login/facebook" >With Facebook</a>
            <!--<a class="google-button" href="https://rns24.net/login/google" >With Google</a>-->
        </div>
        
        <?php if( session()->has('success') ): ?>
        <div class="alert alert-success alert-dismissible fade show" style="margin-top: 15px;" role="alert">
        <?php echo e(session()->get('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php endif; ?>
        <?php if( session()->has('have') ): ?>
        <div class="alert alert-success alert-dismissible fade show" style="margin-top: 15px;" role="alert">
        <?php echo e(session()->get('have')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php endif; ?>
        <?php if( session()->has('failed') ): ?>
        <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 15px;" role="alert">
        <?php echo e(session()->get('failed')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php endif; ?>

    </div>
    
    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <?php
            $i = 5;
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
    <a href="<?php echo e($ad->link); ?>" class="add-img"><img src="<?php echo e(asset('images/ad/'. $ad->image)); ?>" alt=""></a>
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
        <?php
        $i = 3;
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
<<<<<<<<<<<<<<<<<<<<< --><?php /**PATH G:\rns24_net_2021\resources\views/frontend/include/rightcard.blade.php ENDPATH**/ ?>