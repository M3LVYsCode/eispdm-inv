

<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('categoria.index')); ?>">Atras</a>
<form method="POST" action="<?php echo e(route('categoria.update' , $categoria->id)); ?>">
  <?php echo method_field('PUT'); ?>
  <?php echo csrf_field(); ?>
  <label>Nombre:</label>
  <input type="text" name="nombre" value="<?php echo e($categoria->nombre); ?>"/>
  <label>Descripción:</label>
  <input type="text" name="descripcion" value="<?php echo e($categoria->descripcion); ?>"/>
  <label>Activo:</label>
  <input type="text" name="activo" value="<?php echo e($categoria->activo); ?>"/>
  <input type="submit" value="Editar">
</form>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\S_PRESTAMOS_EISPDM\resources\views/categoria/edit.blade.php ENDPATH**/ ?>