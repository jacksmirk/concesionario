<?php
$this->breadcrumbs=array(
	'Encargados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Encargado','url'=>array('index')),
	array('label'=>'Manage Encargado','url'=>array('admin')),
);
?>

<h1>Create Encargado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>