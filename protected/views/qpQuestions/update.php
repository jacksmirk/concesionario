<?php
$this->breadcrumbs=array(
	'Qp Questions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QpQuestions','url'=>array('index')),
	array('label'=>'Create QpQuestions','url'=>array('create')),
	array('label'=>'View QpQuestions','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage QpQuestions','url'=>array('admin')),
);
?>

<h1>Update QpQuestions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>