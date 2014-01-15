<?php
$this->breadcrumbs=array(
	'Quickpolls'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Quickpolls','url'=>array('index')),
	array('label'=>'Create Quickpolls','url'=>array('create')),
	array('label'=>'Update Quickpolls','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Quickpolls','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Quickpolls','url'=>array('admin')),
    array('label'=>'Añadir Página','url'=>array('QpPages/create','quickpoll_id'=>$model->id)),

);
?>

<h1>View Quickpolls #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'status',
	),
)); ?>
