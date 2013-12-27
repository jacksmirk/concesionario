<?php
$this->breadcrumbs=array(
	'Tipo Motors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoMotor','url'=>array('index')),
	array('label'=>'Manage TipoMotor','url'=>array('admin')),
);
?>

<h1>Create TipoMotor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>