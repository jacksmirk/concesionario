<?php
$this->breadcrumbs=array(
	'Preguntas',
);

$this->menu=array(
	array('label'=>'Añadir Pregunta','url'=>array('create','page_id'=>$page_id)),
	array('label'=>'Administrar Preguntas','url'=>array('admin','page_id'=>$page_id)),
);
?>

<h1>Preguntas de la página <?php echo CHtml::link(CHtml::encode($page_number),array('qpPages/view','id'=>$page_id));?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
