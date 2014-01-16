<?php
$this->breadcrumbs=array(
	'Qp Choices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QpChoices','url'=>array('index','question_id'=>$model->question_id)),
	array('label'=>'Manage QpChoices','url'=>array('admin')),
);
?>

<h3>Añadir opción de respuesta para la pregunta:</h3>
<h1><?php echo CHtml::encode($model->question->order_number+1 . '. ' . $model->question->label);?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>