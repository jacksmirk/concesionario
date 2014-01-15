<?php
$this->breadcrumbs=array(
	'Qp Choices',
);

$this->menu=array(
	array('label'=>'Create QpChoices','url'=>array('create')),
	array('label'=>'Manage QpChoices','url'=>array('admin')),
);
?>

<h1>Qp Choices</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
