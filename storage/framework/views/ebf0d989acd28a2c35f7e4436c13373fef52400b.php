<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark " href="<?php echo e(route('dashboard')); ?>" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('logo.show')); ?>" aria-expanded="false">
                        <i class="mdi mdi-umbrella"></i>
                        <span class="hide-menu">Website logo</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('categorynews.show')); ?>" aria-expanded="false">
                    <i class="fa fa-list"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark"  aria-expanded="false">
                        <i class="mdi mdi-receipt"></i>
                        <span class="hide-menu"> News </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <!-- all news page start-->
                        <li class="sidebar-item ml-3">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('news.show')); ?>" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i>
                                <span class="hide-menu"> All News</span>
                            </a>
                        </li>
                        <!-- all news page end -->

                        <!-- pending news page start-->
                        <li class="sidebar-item ml-3">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('pendingnews.show')); ?>" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i>
                                <span class="hide-menu"> Pending News</span>
                            </a>
                        </li>
                        <!-- pending news page end -->
                    </ul>
                </li>



                <!-- user management start -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="hide-menu"> User Management </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <!-- home page start-->
                        <li class="sidebar-item ml-3">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('user.show')); ?>" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="hide-menu">All user</span>
                            </a>
                        </li>
                        <!-- home page end -->

                    </ul>
                </li>
                <!-- user management end -->

                <!-- ad start -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('ad.show')); ?>" aria-expanded="false">
                    <i class="fa fa-camera"></i>
                        <span class="hide-menu">Advertisement</span>
                    </a>
                </li>
                <!-- ad end -->

                <!-- pages start -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" aria-expanded="false">
                        <i class="mdi mdi-receipt"></i>
                        <span class="hide-menu"> Pages </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <!-- adbout page start-->
                        <li class="sidebar-item ml-3">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('about.show')); ?>" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>
                        <!-- adbout page end -->

                        <!-- contact page start-->
                        <li class="sidebar-item ml-3">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('contact.show')); ?>" aria-expanded="false">
                                <i class="fas fa-phone"></i>
                                <span class="hide-menu">Contact</span>
                            </a>
                        </li>
                        <!-- contact page end -->

                    </ul>
                </li>
                <!-- pages end -->

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside><?php /**PATH C:\xampp\htdocs\laravel Project\rns\resources\views/backend/include/leftSideBar.blade.php ENDPATH**/ ?>