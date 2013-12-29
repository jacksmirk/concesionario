<?php
$this->breadcrumbs=array(
	'Compras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Compra','url'=>array('index')),
	array('label'=>'Update Compra','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Compra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Compra','url'=>array('admin')),
    array('label'=>'List Vehiculos','url'=>array('vehiculo/index')),
);
?>

<h1>View Compra #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'type'=>'striped bordered condensed',
    'attributes'=>array(
		'id',
        array(
            'label'=>'Cliente',
            'name'=>'cliente.nombre',
        ),
        array(
            'label'=>'Vehículo',
            'type'=>'raw',
            'value'=>CHtml::encode($model->vehiculoid) .' '. CHtml::link(CHtml::encode('ver detalle'),
                    array('vehiculo/view','id'=>$model->vehiculoid)),
        ),
        array(
            'label'=>'Fabricante',
            'name'=>'fabricante.nombre',
        ),
        array(
            'label'=>'Modelo',
            'name'=>'modelo.nombre',
        ),
        array(
            'label'=>'Precio',
            'value'=>$model->precio . ' €',
        ),
		'fecha_compra',
	),
)); ?>
