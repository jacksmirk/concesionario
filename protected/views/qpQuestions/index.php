<?php
$this->breadcrumbs=array(
	'Qp Questions',
);

$this->menu=array(
	array('label'=>'Create QpQuestions','url'=>array('create')),
	array('label'=>'Manage QpQuestions','url'=>array('admin')),
);
?>

<h1>Qp Questions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
