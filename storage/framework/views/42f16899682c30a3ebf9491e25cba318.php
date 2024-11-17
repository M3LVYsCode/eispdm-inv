

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('categoria.create')); ?>">Crear nueva categoria</a>

<table>
  <tr>
    <th>Nombre</th>
    <th>Descripción</th>
    <th></th>
  </tr>  
  <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <tr>
    <td ><?php echo e($categoria->nombre); ?></td>
    <td ><?php echo e($categoria->descripcion); ?></td>
    <td><a href="<?php echo e(route('categoria.show', $categoria->id)); ?>">Ver</a></td>
    <td><a href="<?php echo e(route('categoria.edit', $categoria->id)); ?>">Editar</a></td>
    <td>
      <form method="POST" action="<?php echo e(route('categoria.destroy', $categoria->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <input type="submit" value="Eliminar">
      </form>
    </td>
  </tr> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>No data.</p>
  <?php endif; ?>
</table>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\S_PRESTAMOS_EISPDM\resources\views/categoria/index.blade.php ENDPATH**/ ?>