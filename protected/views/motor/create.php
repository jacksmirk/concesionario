<?php
$this->breadcrumbs=array(
	'Motors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Motor','url'=>array('index')),
	array('label'=>'Manage Motor','url'=>array('admin')),
);
?>

<h1>Create Motor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'tipoMotorDP'=>$tipoMotorDP)); ?>