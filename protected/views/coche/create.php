<?php
$this->breadcrumbs=array(
	'Coches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coche','url'=>array('index')),
	array('label'=>'Manage Coche','url'=>array('admin')),
);
?>

<h1>Create Coche</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>