<?php
$this->breadcrumbs=array(
	'Motors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Motor','url'=>array('index')),
	array('label'=>'Create Motor','url'=>array('create')),
	array('label'=>'Update Motor','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Motor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Motor','url'=>array('admin')),
);
?>

<h1>View Motor #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipomotorid',
		'cilindrada',
		'potencia',
		'consumo',
		'emisiones',
		'fecha_alta',
		'fecha_mod',
	),
)); ?>
