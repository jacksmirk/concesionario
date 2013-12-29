<?php
$this->breadcrumbs=array(
	'Vehiculos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Vehiculo','url'=>array('index')),
	array('label'=>'Create Vehiculo','url'=>array('create')),
	array('label'=>'Update Vehiculo','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Vehiculo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vehiculo','url'=>array('admin')),
    array('label'=>'Comprar Vehiculo','url'=>array('compra/create','id'=>$model->id), 'visible'=>$model->disponible==1),

);
?>

<h1>View Vehiculo #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'type'=>'striped bordered condensed',
    'attributes'=>array(
		'id',
		'fabricante.nombre',
		'modelo.nombre',
        'tipomotor.tipo',
        'tipomotor.fuente',
		'motor.cilindrada',
        'motor.potencia',
        'motor.consumo',
        'motor.emisiones',
        array(
            'label'=>'Transmisión automática',
            'type'=>'raw',
            'value'=>CHtml::encode($model->getTransmisionAutomatica()),
        ),
		'color',
		'fecha_fabricacion',
		'fecha_alta',
		'fecha_mod',
        array(
            'label'=>'Disponible',
            'type'=>'raw',
            'value'=>CHtml::encode($model->getDisponible()),
        ),
	),
)); ?>
