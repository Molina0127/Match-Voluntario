<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>


    <title>Document</title>
</head>

<body>
    
    <!-- main wrapper start -->
    <div class="main-wrapper">

        <!-- header start -->
        <header class="header">
            <div class="container">
                <div class="header-main">
                    <div class="header-logo">
                        <a href="<?php echo e(Vite::asset('resources/views/home.blade.php')); ?>"><span>match</span>voluntario</a>
                    </div>
                </div>
            </div>
        </header>

    </div>

</body>

</html><?php /**PATH D:\Desktop\Match Voluntario\matchvoluntario\resources\views/home.blade.php ENDPATH**/ ?>