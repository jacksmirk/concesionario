<?php
$this->breadcrumbs=array(
	'Tipo Motors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoMotor','url'=>array('index')),
	array('label'=>'Create TipoMotor','url'=>array('create')),
	array('label'=>'Update TipoMotor','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete TipoMotor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoMotor','url'=>array('admin')),
);
?>

<h1>View TipoMotor #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'fuente',
	),
)); ?>
