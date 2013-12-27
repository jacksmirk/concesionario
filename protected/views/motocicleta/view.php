<?php
$this->breadcrumbs=array(
	'Motocicletas'=>array('index'),
	$model->vehiculoid,
);

$this->menu=array(
	array('label'=>'List Motocicleta','url'=>array('index')),
	array('label'=>'Create Motocicleta','url'=>array('create')),
	array('label'=>'Update Motocicleta','url'=>array('update','id'=>$model->vehiculoid)),
	array('label'=>'Delete Motocicleta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->vehiculoid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Motocicleta','url'=>array('admin')),
);
?>

<h1>View Motocicleta #<?php echo $model->vehiculoid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'vehiculoid',
		'num_ruedas',
	),
)); ?>
