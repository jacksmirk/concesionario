<?php
$this->breadcrumbs=array(
	'Motocicletas',
);

$this->menu=array(
	array('label'=>'Create Motocicleta','url'=>array('create')),
	array('label'=>'Manage Motocicleta','url'=>array('admin')),
);
?>

<h1>Motocicletas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
