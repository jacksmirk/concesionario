<?php
$this->breadcrumbs=array(
	'Quickpolls'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Quickpolls','url'=>array('index')),
	array('label'=>'Create Quickpolls','url'=>array('create')),
	array('label'=>'View Quickpolls','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Quickpolls','url'=>array('admin')),
);
?>

<h1>Update Quickpolls <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>