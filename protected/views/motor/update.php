<?php
$this->breadcrumbs=array(
	'Motors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Motor','url'=>array('index')),
	array('label'=>'Create Motor','url'=>array('create')),
	array('label'=>'View Motor','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Motor','url'=>array('admin')),
);
?>

<h1>Update Motor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>