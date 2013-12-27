<?php
$this->breadcrumbs=array(
	'Particulars',
);

$this->menu=array(
	array('label'=>'Create Particular','url'=>array('create')),
	array('label'=>'Manage Particular','url'=>array('admin')),
);
?>

<h1>Particulars</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
