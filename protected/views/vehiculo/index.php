<?php
$this->breadcrumbs=array(
	'Vehiculos',
);

$this->menu=array(
	array('label'=>'Create Vehiculo','url'=>array('create')),
	array('label'=>'Manage Vehiculo','url'=>array('admin')),
);
?>

<h1>Vehiculos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
