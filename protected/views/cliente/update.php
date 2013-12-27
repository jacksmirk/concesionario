<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cliente','url'=>array('index')),
	array('label'=>'Create Cliente','url'=>array('create')),
	array('label'=>'View Cliente','url'=>array('view','id'=>$model->userid)),
	array('label'=>'Manage Cliente','url'=>array('admin')),
);
?>

<h1>Update Cliente <?php echo $model->userid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>