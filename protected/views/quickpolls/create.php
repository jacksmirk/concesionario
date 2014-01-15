<?php
$this->breadcrumbs=array(
	'Quickpolls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Quickpolls','url'=>array('index')),
	array('label'=>'Manage Quickpolls','url'=>array('admin')),
);
?>

<h1>Create Quickpolls</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>