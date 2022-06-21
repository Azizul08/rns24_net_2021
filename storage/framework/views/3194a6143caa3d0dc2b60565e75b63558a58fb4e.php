<!-- Sidebar Widget -->
<div class="single-sidebar-widget p-30">
    <!-- Section Title -->
    <div class="section-heading">
        <h5>Categories</h5>
    </div>

    <!-- Catagory Widget -->
    <ul class="catagory-widgets">

        <?php $__currentLoopData = App\Models\Backend\Category\Category::orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if( count( App\Models\Backend\News\News::orderBy('id','asc')->where('category_id',$category->id)->where('is_delete',0)->get() ) > 0 ): ?>
        <li>
            <a href="#">
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
</div><?php /**PATH C:\xampp\htdocs\laravel\rns\resources\views/frontend/include/sidebarcategory.blade.php ENDPATH**/ ?>