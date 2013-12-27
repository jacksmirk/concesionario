<?php
$this->breadcrumbs=array(
	'Motocicletas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Motocicleta','url'=>array('index')),
	array('label'=>'Manage Motocicleta','url'=>array('admin')),
);
?>

<h1>Create Motocicleta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>