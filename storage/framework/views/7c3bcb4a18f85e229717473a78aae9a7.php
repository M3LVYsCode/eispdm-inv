

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('categoria.index')); ?>">Back</a>
<h1><?php echo e($categoria->nombre); ?></h1>
<p><?php echo e($categoria->descripcion); ?><p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\S_PRESTAMOS_EISPDM\resources\views/categoria/show.blade.php ENDPATH**/ ?>