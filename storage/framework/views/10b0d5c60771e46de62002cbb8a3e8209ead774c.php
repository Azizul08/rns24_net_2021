<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">

                <span class="logo-text">
                    <!-- dark Logo text -->
                    <?php $__currentLoopData = App\Models\Backend\Logo::orderBy('id','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> )
                    <img src="<?php echo e(asset('images/logo/' . $logo->image )); ?>" class="img-fluid" width="50px"  alt="">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </span>
                <!-- Logo icon -->
                <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                <!-- </b> -->
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <?php echo $__env->yieldContent('create_new_button'); ?>
                </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <?php echo $__env->yieldContent("search_form"); ?>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
            
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superAdmin')): ?>
                    <a class="nav-link dropdown-toggle waves-effect waves-dark"  aria-haspopup="true" aria-expanded="false">Super admin</i>
                    </a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                    <a class="nav-link dropdown-toggle waves-effect waves-dark"  aria-haspopup="true" aria-expanded="false">Admin</i>
                    </a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editor')): ?>
                    <a class="nav-link dropdown-toggle waves-effect waves-dark"  aria-haspopup="true" aria-expanded="false">Editor</i>
                    </a>
                    <?php endif; ?>
                    
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="<?php echo e(route('message.show')); ?>"  aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                    </a>

                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <?php if(  Auth::user()->image == NULL ): ?>
                        <img src="<?php echo e(asset('images/profile/user.png')); ?>" width="31px" alt=""> <br> <br>
                        <?php else: ?>
                        <img src="<?php echo e(asset('images/profile/'. Auth::user()->image)); ?>" width="31px" alt=""> <br> <br>
                        <?php endif; ?>
                       
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">

                        <a class="dropdown-item" href="<?php echo e(route('user.profileedit', Auth::user()->id )); ?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                        
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                        </a>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->


            </ul>
        </div>
    </nav>
</header><?php /**PATH /home/rns24/public_html/resources/views/backend/include/header.blade.php ENDPATH**/ ?>