<?php
$this->breadcrumbs=array(
	'Qp Answer Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List QpAnswerType','url'=>array('index')),
	array('label'=>'Create QpAnswerType','url'=>array('create')),
	array('label'=>'Update QpAnswerType','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete QpAnswerType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QpAnswerType','url'=>array('admin')),
);
?>

<h1>View QpAnswerType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
