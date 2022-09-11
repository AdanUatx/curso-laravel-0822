<?php $__env->startSection('content'); ?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-primary">
                <?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
                    <div class="alert alert-info">
                        <?php echo e(\Illuminate\Support\Facades\Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="panel-body">
                    <div>
                        <div class="alert alert-success "> Listado empleados</div>
                    </div>

                    <div class="pull-right">
                    <a href="<?php echo e(route('empleado.create')); ?>" class="btn btn-primary">Agregar Empleado</a>
                    </div>

                    <div class="table-container">
                        <table id="tablaEmpleados" class="table table-bordered table-striped">
                            <thead>
                            <th>Codigo empleado</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                            </thead>

                            <tbody>
                            <?php if($empleados->count()): ?>
                                <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($empleado->codigo_empleado); ?></td>
                                        <td><?php echo e($empleado->nombre); ?></td>
                                        <td><?php echo e($empleado->paterno . " " . $empleado->materno); ?></td>
                                        <td><?php echo e($empleado->email); ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="<?php echo e(route('empleado.show', $empleado->id)); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a class="btn-sm btn-warning" href="<?php echo e(route('empleado.edit',$empleado->id)); ?>">Editar</a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-<?php echo e($empleado->id); ?>">Eliminar</button>
                                            <?php echo $__env->make('Empleado.modalEliminar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5"> No hay Registros</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>