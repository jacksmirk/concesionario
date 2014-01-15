<?php
$this->breadcrumbs=array(
	'Qp Choices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QpChoices','url'=>array('index')),
	array('label'=>'Manage QpChoices','url'=>array('admin')),
);
?>

<h1>Create QpChoices</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>