<?php
$this->breadcrumbs=array(
	'Tipo Motors',
);

$this->menu=array(
	array('label'=>'Create TipoMotor','url'=>array('create')),
	array('label'=>'Manage TipoMotor','url'=>array('admin')),
);
?>

<h1>Tipo Motors</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
