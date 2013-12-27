<?php
$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cuenta','url'=>array('index')),
	array('label'=>'Create Cuenta','url'=>array('create')),
	array('label'=>'Update Cuenta','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Cuenta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cuenta','url'=>array('admin')),
);
?>

<h1>View Cuenta #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'clienteid',
		'fecha_alta',
		'fecha_mod',
		'activa',
	),
)); ?>
