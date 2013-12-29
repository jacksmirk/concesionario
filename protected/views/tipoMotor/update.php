<?php
$this->breadcrumbs=array(
	'Tipo Motors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoMotor','url'=>array('index')),
	array('label'=>'Create TipoMotor','url'=>array('create')),
	array('label'=>'View TipoMotor','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoMotor','url'=>array('admin')),
);
?>

<h1>Update TipoMotor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>