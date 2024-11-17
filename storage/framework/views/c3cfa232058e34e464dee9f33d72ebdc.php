

<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('categoria.index')); ?>">Atras</a>
<form method="POST" action="<?php echo e(route('categoria.store')); ?>">
  <?php echo csrf_field(); ?>
  <label>Nombre:</label>
  <input type="text" name="nombre"/>
  <label>Descripción:</label>
  <input type="text" name="descripcion"/>
  <input type="submit" value="Create">
</form>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\S_PRESTAMOS_EISPDM\resources\views/categoria/create.blade.php ENDPATH**/ ?>