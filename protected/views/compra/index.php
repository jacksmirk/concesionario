<?php
$this->breadcrumbs=array(
	'Compras',
);

$this->menu=array(
	array('label'=>'Manage Compra','url'=>array('admin')),
    array('label'=>'List Vehiculos','url'=>array('vehiculo/index')),

);
?>

<h1>Compras</h1>


<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'grid1',
    'itemsCssClass'=>'table table-bordered table-condensed',
    'dataProvider' => $dataProvider,
    //'extraRowColumns' => array('tipomotor_tipo'),
    'mergeColumns' => array('cliente_nombre','fabricante_nombre'),
    'columns' => array(
        array(
            'name' => 'cliente_nombre',
            'value' => '$data->cliente->nombre',
        ),
        array(
            'name' => 'fabricante_nombre',
            'value'=> '$data->fabricante->nombre',
        ),
        array(
            'name' => 'modelo_nombre',
            'value' => '$data->modelo->nombre',
        ),
        'precio',
        'fecha_compra',
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->id),array("view","id"=>$data->id))',
        ),
    ),
)); ?>