<?php
$this->breadcrumbs=array(
	'Qp Opinions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QpOpinions','url'=>array('index')),
	array('label'=>'Create QpOpinions','url'=>array('create')),
	array('label'=>'View QpOpinions','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage QpOpinions','url'=>array('admin')),
);
?>

<h1>Update QpOpinions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>