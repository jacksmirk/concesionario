<?php
$this->breadcrumbs=array(
	'Qp Pages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QpPages','url'=>array('index')),
	array('label'=>'Create QpPages','url'=>array('create')),
	array('label'=>'View QpPages','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage QpPages','url'=>array('admin')),
);
?>

<h1>Update QpPages <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>