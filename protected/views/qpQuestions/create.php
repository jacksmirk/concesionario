<?php
$this->breadcrumbs=array(
	'Qp Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QpQuestions','url'=>array('index')),
	array('label'=>'Manage QpQuestions','url'=>array('admin')),
);
?>

<h1>Create QpQuestions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>