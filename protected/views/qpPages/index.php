<?php
$this->breadcrumbs=array(
	'Qp Pages',
);

$this->menu=array(
	array('label'=>'Create QpPages','url'=>array('create')),
	array('label'=>'Manage QpPages','url'=>array('admin')),
);
?>

<h1>Qp Pages</h1>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
