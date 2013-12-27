<?php
$this->breadcrumbs=array(
	'Encargados'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Encargado','url'=>array('index')),
	array('label'=>'Create Encargado','url'=>array('create')),
	array('label'=>'View Encargado','url'=>array('view','id'=>$model->userid)),
	array('label'=>'Manage Encargado','url'=>array('admin')),
);
?>

<h1>Update Encargado <?php echo $model->userid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>