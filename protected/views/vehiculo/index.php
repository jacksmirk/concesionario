<?php
$this->breadcrumbs=array(
	'Vehiculos',
);

$this->menu=array(
	array('label'=>'Create Vehiculo','url'=>array('create')),
	array('label'=>'Manage Vehiculo','url'=>array('admin')),
);
?>

<h1>Vehículos</h1>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>

<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'grid1',
    'itemsCssClass'=>'table table-bordered table-condensed',
    'dataProvider' => $dataProvider,
    //'extraRowColumns' => array('tipomotor_tipo'),
    'mergeColumns' => array('fabricante_nombre','modelo_nombre'),
    'columns' => array(
        array(
            'name' => 'fabricante_nombre',
            'value' => '$data->fabricante->nombre',
        ),
        array(
            'name' => 'modelo_nombre',
            'value' => '$data->modelo->nombre',
        ),
        array(
            'name' => 'tipomotor_tipo',
            'value' => '$data->motor->tipomotor->tipo',
        ),
        array(
            'name' => 'tipomotor_fuente',
            'value' => '$data->motor->tipomotor->fuente',
        ),
        array(
            'name' => 'motor_cilindrada',
            'value' => '$data->motor->cilindrada',
        ),
        array(
            'name' => 'motor_potencia',
            'value' => '$data->motor->potencia',
        ),
        array(
            'name' => 'motor_consumo',
            'value' => '$data->motor->consumo',
        ),
        array(
            'name' => 'motor_emision',
            'value' => '$data->motor->emisiones',
        ),
        array(
            'name'=>'transmision',
            'value'=>'$data->getTransmisionAutomatica()',
        ),
        'color',
        'fecha_fabricacion',
        'fecha_alta',
        'fecha_mod',
        array(
            'name'=>'disponible',
            'value'=>'$data->getDisponible()'
        ),
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->id),array("view","id"=>$data->id))',
        ),
    ),
)); ?>