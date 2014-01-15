<?php
$this->breadcrumbs=array(
	'Qp Answer Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QpAnswerType','url'=>array('index')),
	array('label'=>'Manage QpAnswerType','url'=>array('admin')),
);
?>

<h1>Create QpAnswerType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>