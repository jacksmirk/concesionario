<?php
$this->breadcrumbs=array(
	'Coches'=>array('index'),
	$model->vehiculoid,
);

$this->menu=array(
	array('label'=>'List Coche','url'=>array('index')),
	array('label'=>'Create Coche','url'=>array('create')),
	array('label'=>'Update Coche','url'=>array('update','id'=>$model->vehiculoid)),
	array('label'=>'Delete Coche','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->vehiculoid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coche','url'=>array('admin')),
);
?>

<h1>View Coche #<?php echo $model->vehiculoid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'vehiculoid',
		'num_puertas',
	),
)); ?>
