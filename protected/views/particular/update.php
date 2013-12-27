<?php
$this->breadcrumbs=array(
	'Particulars'=>array('index'),
	$model->clientid=>array('view','id'=>$model->clientid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Particular','url'=>array('index')),
	array('label'=>'Create Particular','url'=>array('create')),
	array('label'=>'View Particular','url'=>array('view','id'=>$model->clientid)),
	array('label'=>'Manage Particular','url'=>array('admin')),
);
?>

<h1>Update Particular <?php echo $model->clientid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>