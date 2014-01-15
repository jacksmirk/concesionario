<?php
$this->breadcrumbs=array(
	'Qp Opinions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QpOpinions','url'=>array('index')),
	array('label'=>'Manage QpOpinions','url'=>array('admin')),
);
?>

<h1>Create QpOpinions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>