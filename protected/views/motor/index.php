<?php
$this->breadcrumbs=array(
	'Motors',
);

$this->menu=array(
	array('label'=>'Create Motor','url'=>array('create')),
	array('label'=>'Manage Motor','url'=>array('admin')),
);
?>

<h1>Motors</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
