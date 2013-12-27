<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'List Cliente','url'=>array('index')),
	array('label'=>'Create Cliente','url'=>array('create')),
	array('label'=>'Update Cliente','url'=>array('update','id'=>$model->userid)),
	array('label'=>'Delete Cliente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cliente','url'=>array('admin')),
);
?>

<h1>View Cliente #<?php echo $model->userid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'userid',
		'nombre',
		'telefono',
		'fecha_alta',
		'fecha_mod',
	),
)); ?>
