<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->clientid,
);

$this->menu=array(
	array('label'=>'List Empresa','url'=>array('index')),
	array('label'=>'Create Empresa','url'=>array('create')),
	array('label'=>'Update Empresa','url'=>array('update','id'=>$model->clientid)),
	array('label'=>'Delete Empresa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->clientid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Empresa','url'=>array('admin')),
);
?>

<h1>View Empresa #<?php echo $model->clientid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'clientid',
		'cif',
		'nombre_contacto',
	),
)); ?>
