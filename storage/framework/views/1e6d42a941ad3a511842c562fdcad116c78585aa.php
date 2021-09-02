<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('To Do App')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/dashboard.css')); ?>">
    <div class="wrapper">
        <form id="submit" method="POST">
            <input data-userid="<?php echo e(Auth::user()->email); ?>" type="text" id="task" name="Task" required placeholder="Enter Your Task">
            <input id="submitbtn" type="submit" value="Add">
        </form>
        <div class="tasks">
            <div class="loader">
                
            </div>
            <div id="pending">
                <h4>Pending Tasks</h4>
                <ul>

                </ul>
            </div>
            <div id="done">
                <h4>Completed Tasks</h4>
                <ul>
                    
                </ul>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('frontend/js/Todocode.js')); ?>"></script>
        <script>            
            $(document).ready(function() {
                get("pending");                
                get("done");

                $('#submit').on("submit", function(e) {
                    e.preventDefault();
                     insert(); 
                     $("#pending ul").html('');
                     $("#done ul").html('');
                     $("#task").val("");
                     get('pending');  
                     get('done');
                });
            });
        </script>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH D:\Xampp\htdocs\UpdatedProject\resources\views/dashboard.blade.php ENDPATH**/ ?>