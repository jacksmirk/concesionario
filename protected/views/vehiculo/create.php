<?php
$this->breadcrumbs=array(
	'Vehiculos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vehiculo','url'=>array('index')),
	array('label'=>'Manage Vehiculo','url'=>array('admin')),
    array('label'=>'Crear Fabricante','url'=>array('fabricante/create')),
    array('label'=>'Crear Modelo','url'=>array('modelo/create')),
    array('label'=>'Crear Motor','url'=>array('motor/create')),

);
?>

<h1>Create Vehiculo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>