<?php
$this->breadcrumbs=array(
	'Qp Answer Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QpAnswerType','url'=>array('index')),
	array('label'=>'Create QpAnswerType','url'=>array('create')),
	array('label'=>'View QpAnswerType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage QpAnswerType','url'=>array('admin')),
);
?>

<h1>Update QpAnswerType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>