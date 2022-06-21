<?php $__env->startSection('header-section'); ?>
<title><?php echo e(Str::limit($news->title,30)); ?></title>
<meta name="og:title" content="<?php echo e($news->title); ?>" />
<meta name="og:description" content="<?php echo e($news->title); ?>" />
<meta name="og:type" content="article" />
<meta name="og:url" content="https://rns24.net/newsdetail/" />
<meta name="og:image" content="<?php echo e(asset('images/news/'. $news->image)); ?>" />

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- Favicon -->
<link type="image/gif" rel="shortcut icon" href="<?php echo e(asset('frontend/img/fav.JPG')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>

<!-- banner area start -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url( <?php echo e(asset('frontend/img/bg-img/3.jpg')); ?>); background-position: top;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?php echo e($news->title); ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner area end -->


<!-- page indicator start -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('category.show',$category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($news->title); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- page indicator end -->

<!-- main section start -->
<section class="post-details-area">
    <div class="container">
        <div class="row justify-content-center">
            
            <!-- Post Details Content Area -->
            <div class="col-12 col-xl-8">
                <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                    <div class="blog-thumb mb-30">
                        <?php if( $news->image == NULL ): ?>
                        <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                        <?php else: ?>
                        <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                        <?php endif; ?>
                        <?php if( $news->video == NULL ): ?>
                        <?php else: ?>
                        <iframe src="<?php echo e($news->video); ?>" style="margin-top: 15px;width: 100%;height: 300px;" frameborder="0"></iframe>
                        <?php endif; ?>
                        <?php if( $news->audio == NULL ): ?>
                        <?php else: ?>
                        <audio src="<?php echo e(asset('audio/'.$news->audio .'/'. $news->audio)); ?>" controls></audio>
                        <?php endif; ?>
                    </div>

                    <div class="blog-content">
                        <div class="post-meta">
                            <a><?php echo e($news->created_at->toDayDateTimeString()); ?></a>
                            <a><?php echo e($category->name); ?></a>
                        </div>
                        <h4 class="post-title"><?php echo e($news->title); ?></h4>

                        <p>
                            <?php echo $news->description; ?>

                        </p>
                        
                        <div class="gallery-slides owl-carousel">
                        
                            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <!-- Single Trending Post loop start-->
                            <div class="single-trending-post gallery-news">
                                <div class="gallery-image">
                                    <img src="<?php echo e(asset('images/gallery/'.$gallery->image)); ?>" alt="">
                                    <a data-fancybox="gallery" href="<?php echo e(asset('images/gallery/'.$gallery->image)); ?>" data-caption="<?php echo e($gallery->caption); ?>">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <p><?php echo e($gallery->caption); ?></p>
                            </div>
                            <!--Single Trending Post loop end-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                        </div>
                        
                    </div>
                </div>

                <!-- Related Post Area -->
                <div class="related-post-area bg-white mb-30 px-30 pt-30 pb-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                    <?php
                    $i = 6;
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

                    <div class="trending-post-slides owl-carousel">
                    
                        <!-- Single Trending Post loop start-->
                        <?php $__currentLoopData = $relatednewses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-trending-post">
                            <?php if( $news->image == NULL ): ?>
                            <a href="<?php echo e(route('newsdetail', $news->id)); ?>">
                                <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('newsdetail', $news->id)); ?>">
                                <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                            </a>
                            <?php endif; ?>
                            <div class="post-content" >
                                <?php if( $news->video != NULL ): ?>
                                <a href="<?php echo e(route('newsdetail', $news->id)); ?>" class="post-cata">Video</a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('newsdetail', $news->id)); ?>" class="post-title"><?php echo e($news->title); ?></a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- Single Trending Post loop end-->

                    </div>
                </div>


            </div>

            <!-- Sidebar Widget -->
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">
                    
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
                        <a href="<?php echo e($ad->link); ?>" class="add-img"><img src="<?php echo e(asset('images/ad/'. $ad->image)); ?>" alt=""></a>
                        <?php endif; ?>
                        <?php
                        $i--;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>
<!-- main section end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rns24_net_2021\resources\views/frontend/pages/newsdetail.blade.php ENDPATH**/ ?>