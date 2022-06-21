
<!-- ##### NAVBAR Area Start ##### -->
<header class="header-area">

<div class="todays-date">
    <p><?php echo e(Carbon\Carbon::today()->toFormattedDateString()); ?></p>
</div>

<!-- Navbar Area -->
<div class="mag-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="magNav">

            <!-- Nav brand -->
            <a href="<?php echo e(route('index')); ?>" class="nav-brand">
                <?php $__currentLoopData = App\Models\Backend\Logo::orderBy('id','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <img src="<?php echo e(asset('images/logo/' . $logo->image )); ?>" class="img-fluid" style="width: 60px;" alt="">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Nav Content -->
            <div class="nav-content d-flex align-items-center">
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li class="active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                            
                            <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->where('is_delete',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->where('is_pending',0)->get() ) > 0 ): ?>
                            <li><a href="<?php echo e(route('category.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>

                                <div class="megamenu">

                                    <!-- mega menu item start -->
                                    <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_delete',0)->where('is_pending',0)->where('category_id', $category->id)->where('status',1)->take(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <ul class="single-mega cn-col-4">
                                        <div class="row">
                                            <div class="col-md-12 nav-news-box">
                                                <a href="<?php echo e(route('newsdetail', $news->id)); ?>">
                                                <?php if($news->image == NULL ): ?>
                                                    <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                                                <?php endif; ?>
                                                </a>
                                                <p><?php echo e($news->title); ?></p>
                                                <p> <i class="fas fa-clock"></i> <?php echo e($news->created_at->diffForHumans()); ?></p>
                                            </div>
                                        </div>
                                    </ul>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- mega menu item end -->
                                    
                                </div>

                            </li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                        </ul>
                    </div> 
                    <!-- Nav End -->
                </div>

                <div class="top-meta-data d-flex align-items-center">
                    <!-- Top Search Area -->
                    <div class="top-search-area">
                        <form action="<?php echo e(route('search')); ?>" method="get">
                        <?php echo csrf_field(); ?>
                            <input type="search" name="search" id="topSearch" required>
                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
</header>
<!-- ##### NAVBAR Area End ##### --><?php /**PATH D:\app\resources\views/frontend/include/navbar.blade.php ENDPATH**/ ?>