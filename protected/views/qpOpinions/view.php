<?php
$this->breadcrumbs=array(
	'Qp Opinions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QpOpinions','url'=>array('index')),
	array('label'=>'Create QpOpinions','url'=>array('create')),
	array('label'=>'Update QpOpinions','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete QpOpinions','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QpOpinions','url'=>array('admin')),
);
?>

<h1>View QpOpinions #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question_id',
		'content',
	),
)); ?>
