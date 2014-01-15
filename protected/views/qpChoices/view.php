<?php
$this->breadcrumbs=array(
	'Qp Choices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QpChoices','url'=>array('index')),
	array('label'=>'Create QpChoices','url'=>array('create')),
	array('label'=>'Update QpChoices','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete QpChoices','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QpChoices','url'=>array('admin')),
);
?>

<h1>View QpChoices #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question_id',
		'destination_page_id',
		'label',
		'votes',
		'order',
	),
)); ?>
