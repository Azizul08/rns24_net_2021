

<?php $__env->startSection('body-content'); ?>
<!-- ##### Banner Area Start ##### -->
<div class="banner-area">
     
     <div class="container-fluid">

         <div class="row news-banner">
             <div class="col-md-4">
                 
                 <div class="row">

                     <!--- item start --->
                     <?php
                        $i = 0;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                         <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                             <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--- item end --->

                     <!--- item start --->
                     <?php
                        $i = 1;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--- item end --->

                     <!--- item start --->
                     <?php
                        $i = 2;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <!--- item end --->

                    <!--- item start --->
                    <?php
                        $i = 3;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--- item end --->

                 </div>
             </div>

             <!--- item start --->
            <?php
                $i = 4;
            ?>
            <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( $i == 0 ): ?>
             <div class="col-md-4 col-12">
                 <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                     <div class="banner-news-item left" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <p>MAY 8, 2018</p>
                                <h2><?php echo e($news->title); ?></h2>
                                <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                            </div>
                        </div>
                     </div>
                 </a>
             </div>
             <?php endif; ?>
            <?php
                $i--;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <!--- item end --->

             <div class="col-md-4">
                 
                 <div class="row">

                     <!--- item start --->
                     <?php
                        $i = 5;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--- item end --->

                     <!--- item start --->
                     <?php
                        $i = 6;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--- item end --->

                     <!--- item start --->
                     <?php
                        $i = 7;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <!--- item end --->

                      <!--- item start --->
                      <?php
                        $i = 8;
                     ?>
                     <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if( $i == 0 ): ?>
                     <div class="col-md-6 col-6">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <div class="banner-news-item right" style="background-image: url( <?php echo e(asset('images/news/'.$news->image)); ?>)">
                                 <!-- Post Contetnt -->
                                 <div class="post-content text-center">
                                     <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                         <p>MAY 8, 2018</p>
                                         <h2><?php echo e($news->title); ?></h2>
                                         <p><span><?php echo Str::limit($news->description,20); ?></span></p>
                                     </div>
                                 </div>
                             </div>
                        </a>
                     </div>
                     <?php endif; ?>
                     <?php
                        $i--;
                     ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <!--- item end --->

                 </div>
             </div>

         </div>

     </div>

</div>
 <!-- ##### Banner Area End ##### -->

 <!-- ##### Main Posts Area Start ##### -->
 <section class="mag-posts-area d-flex flex-wrap">

    <?php echo $__env->make('frontend.include.leftcard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


     <!-- >>>>>>>>>>>>>>>>>>>>
          MIDDLE Posts Area
     <<<<<<<<<<<<<<<<<<<<< -->
     <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
         
            <!-- all newses  Area start-->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>All News</h5>
                </div>

                <div class="trending-post-slides owl-carousel">
                    
                    <!-- Single  Post loop start-->
                    <?php $__currentLoopData = $allnewses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-trending-post">
                        <?php if( $news->image == NULL ): ?>
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                            <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                        </a>
                        <?php endif; ?>
                        <div class="post-content">
                            <?php if( $news->video != NULL ): ?>
                            <a class="post-cata">Video</a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" class="post-title"><?php echo e($news->title); ?></a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Single  Post loop end-->

                </div>
            </div>
            <!-- all newses news Area end-->

         <!-- Feature news  Area start -->
         <div class="feature-video-posts mb-30">
             <!-- Section Title -->
             <div class="section-heading">
                 <h5>Featured News</h5>
             </div>

            <div class="featured-video-posts">
                <div class="row">
                    
                    <!--- left part start --->
                    <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_featured',1)->where('is_pending',0)->where('status',1)->where('is_delete',0)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-lg-7">
                        
                        <!-- Single Featured Post -->
                        <div class="single-featured-post">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <a href="<?php echo e(route('newsdetail', $news->slug)); ?>">
                                    <?php if( $news->image == NULL ): ?>
                                    <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="<?php echo e(route('newsdetail', $news->slug)); ?>"><?php echo e($news->created_at->toDayDateTimeString()); ?></a>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $category->id == $news->category->id ): ?>
                                    <a href="<?php echo e(route('newsdetail', $news->slug)); ?>"><?php echo e($category->name); ?></a>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" class="post-title"><?php echo e($news->title); ?></a>
                                <p><?php echo Str::limit($news->description,150); ?></p>
                            </div>
                            
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--- left part end --->

                    <!--- right part start -->
                    <div class="col-12 col-lg-5">

                        <!-- Featured Video Posts Slide -->
                        <div class="featured-video-posts-slide owl-carousel">

                            <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( count( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('category_id',$category->id)->where('is_delete',0)->where('is_featured',1)->where('status',1)->get() ) > 0 ): ?>
                            <!-- slide for one category start --->
                            <div class="single--slide">
                                
                                <!-- Single Blog Post -->
                                <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('category_id', $category->id)->where('status',1)->take(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-blog-post d-flex style-3">
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

                            </div>
                            <!-- slide for one category end --->
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <!--- right part end -->

                </div>
            </div>
        </div>
        <!-- Feature news  Area end -->

        <div class="row">

            <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( count( App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('category_id',$category->id)->where('is_delete',0)->where('status',1)->get() ) > 0 ): ?>
            <!--- left part start -->
            <div class="col-md-6">
                <!-- category wise news start -->
                <div class="most-viewed-videos mb-30">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>"><?php echo e($category->name); ?></a>
                    </div>

                    <div class="row most-viewed-videos-slide-two owl-carousel">

                        <!-- Single Featured Post -->
                        <div class="col-md-12">

                            <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('category_id', $category->id)->where('status',1)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-featured-post">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail mb-50">
                                    <?php if( $news->image == NULL ): ?>
                                    <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" target="blank">
                                        <img src="<?php echo e(asset('images/news/thumbnail.png')); ?>" alt="">
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" target="blank">
                                        <img src="<?php echo e(asset('images/news/'. $news->image)); ?>" alt="">
                                    </a>
                                    <?php endif; ?>
                                    <?php if( $news->video != NULL ): ?>
                                    <a class="<?php echo e(route('newsdetail', $news->slug)); ?>"><i class="fa fa-play"></i></a>
                                    <?php endif; ?>
                                </div>
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="<?php echo e(route('newsdetail', $news->slug)); ?>"><?php echo e($news->created_at->toDayDateTimeString()); ?></a>
                                    </div>
                                    <a href="<?php echo e(route('newsdetail', $news->slug)); ?>" class="post-title"><?php echo e($news->title); ?></a>
                                    <p><?php echo Str::limit($news->description, 150); ?></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!--- item start -->
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = App\Models\Backend\News\News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('category_id', $category->id)->where('status',1)->take(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( $i > 0 ): ?>
                            <div class="single-blog-post d-flex style-3 mb-30">
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
                            <?php endif; ?>
                            <?php
                                $i++;
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!--- item end -->

                        </div>
                        <!-- Single Featured end -->
                        
                    </div>
                </div>
                <!-- category wise news end -->
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--- left part end -->

        </div>
         
     </div>
     <!-- >>>>>>>>>>>>>>>>>>>>
          MIDDLE Posts Area END
     <<<<<<<<<<<<<<<<<<<<< -->

     

     <?php echo $__env->make('frontend.include.rightcard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 </section>
 <!-- ##### Main Posts Area End ##### -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.template.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel Project\rns\resources\views/frontend/pages/index.blade.php ENDPATH**/ ?>