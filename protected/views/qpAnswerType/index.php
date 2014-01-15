<?php
$this->breadcrumbs=array(
	'Qp Answer Types',
);

$this->menu=array(
	array('label'=>'Create QpAnswerType','url'=>array('create')),
	array('label'=>'Manage QpAnswerType','url'=>array('admin')),
);
?>

<h1>Qp Answer Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
