<?php
$this->breadcrumbs=array(
	'Motocicletas'=>array('index'),
	$model->vehiculoid=>array('view','id'=>$model->vehiculoid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Motocicleta','url'=>array('index')),
	array('label'=>'Create Motocicleta','url'=>array('create')),
	array('label'=>'View Motocicleta','url'=>array('view','id'=>$model->vehiculoid)),
	array('label'=>'Manage Motocicleta','url'=>array('admin')),
);
?>

<h1>Update Motocicleta <?php echo $model->vehiculoid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>