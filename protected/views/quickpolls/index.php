<?php
$this->breadcrumbs=array(
	'Quickpolls',
);

$this->menu=array(
	array('label'=>'Create Quickpolls','url'=>array('create')),
	array('label'=>'Manage Quickpolls','url'=>array('admin')),
);
?>

<h1>Quickpolls</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
