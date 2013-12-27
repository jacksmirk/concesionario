<?php
$this->breadcrumbs=array(
	'Coches'=>array('index'),
	$model->vehiculoid=>array('view','id'=>$model->vehiculoid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coche','url'=>array('index')),
	array('label'=>'Create Coche','url'=>array('create')),
	array('label'=>'View Coche','url'=>array('view','id'=>$model->vehiculoid)),
	array('label'=>'Manage Coche','url'=>array('admin')),
);
?>

<h1>Update Coche <?php echo $model->vehiculoid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>