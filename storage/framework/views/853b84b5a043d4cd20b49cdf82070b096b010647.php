<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title>RNS-Admin Panel</title>

    <!-- Favicon -->
    <link type="image/gif" rel="shortcut icon" href="">
    
    <!-- Favicon -->
    <link type="image/gif" rel="shortcut icon" href="<?php echo e(asset('frontend/img/fav.JPG')); ?>">

    <!-- rich text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/dist/css/rte_theme_default.css')); ?>">


    <!--- Font Awesome CSS 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- Custom CSS -->

    <?php echo $__env->yieldContent('per_page_css'); ?>
    <link href="<?php echo e(asset('backend/assets/libs/flot/css/float-chart.css')); ?>" rel="stylesheet">

    
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('backend/dist/css/style.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/dist/css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/assets/libs/toastr/build/toastr.min.css')); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head><?php /**PATH C:\xampp\htdocs\laravel\rns24\resources\views/backend/include/head.blade.php ENDPATH**/ ?>