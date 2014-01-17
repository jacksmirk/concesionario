<?php
$this->breadcrumbs=array(
	'Qp Choices',
);

$this->menu=array(
	array('label'=>'Create QpChoices','url'=>array('create')),
	array('label'=>'Manage QpChoices','url'=>array('admin')),
);
?>

<h3>Opciones de respuesta para la pregunta:</h3>
<h1><?php echo CHtml::encode($question->order_number+1 . '. ' . $question->label);?></h1>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
