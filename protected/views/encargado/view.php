<?php
$this->breadcrumbs=array(
	'Encargados'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'List Encargado','url'=>array('index')),
	array('label'=>'Create Encargado','url'=>array('create')),
	array('label'=>'Update Encargado','url'=>array('update','id'=>$model->userid)),
	array('label'=>'Delete Encargado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Encargado','url'=>array('admin')),
);
?>

<h1>View Encargado #<?php echo $model->userid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'userid',
		'nombre',
		'fecha_alta',
		'fecha_mod',
	),
)); ?>
