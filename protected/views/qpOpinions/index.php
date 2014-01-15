<?php
$this->breadcrumbs=array(
	'Qp Opinions',
);

$this->menu=array(
	array('label'=>'Create QpOpinions','url'=>array('create')),
	array('label'=>'Manage QpOpinions','url'=>array('admin')),
);
?>

<h1>Qp Opinions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
