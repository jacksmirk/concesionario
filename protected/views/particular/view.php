<?php
$this->breadcrumbs=array(
	'Particulars'=>array('index'),
	$model->clientid,
);

$this->menu=array(
	array('label'=>'List Particular','url'=>array('index')),
	array('label'=>'Create Particular','url'=>array('create')),
	array('label'=>'Update Particular','url'=>array('update','id'=>$model->clientid)),
	array('label'=>'Delete Particular','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->clientid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Particular','url'=>array('admin')),
);
?>

<h1>View Particular #<?php echo $model->clientid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'clientid',
		'nif',
		'fecha_nacimiento',
	),
)); ?>
