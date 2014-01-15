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

<?php echo CHtml::encode('No hay páginas asociadas a la quickpoll seleccionada'); ?>