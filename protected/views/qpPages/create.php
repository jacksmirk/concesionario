<?php
$this->breadcrumbs=array(
	'Qp Pages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QpPages','url'=>array('index', 'quickpoll_id'=>$model->quickpoll_id)),
	array('label'=>'Manage QpPages','url'=>array('admin')),
);
?>

<h1>Añadir página a Quickpoll</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
                                                )); ?>