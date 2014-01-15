<?php
$this->breadcrumbs=array(
	'Qp Choices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QpChoices','url'=>array('index')),
	array('label'=>'Create QpChoices','url'=>array('create')),
	array('label'=>'View QpChoices','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage QpChoices','url'=>array('admin')),
);
?>

<h1>Update QpChoices <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>