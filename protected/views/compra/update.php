<?php
$this->breadcrumbs=array(
	'Compras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Compra','url'=>array('index')),
	array('label'=>'View Compra','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Compra','url'=>array('admin')),
    array('label'=>'List Vehiculos','url'=>array('vehiculo/index')),
);
?>

<h1>Update Compra <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>