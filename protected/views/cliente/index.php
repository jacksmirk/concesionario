<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Create Cliente','url'=>array('create')),
	array('label'=>'Manage Cliente','url'=>array('admin')),
);
?>

<h1>Clientes</h1>


<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'grid1',
    'itemsCssClass'=>'table table-bordered table-condensed',
    'dataProvider' => $dataProvider,
    //'extraRowColumns' => array('tipomotor_tipo'),
    //'mergeColumns' => array('fabricante_nombre','modelo_nombre'),
    'columns' => array(
        'nombre',
        'telefono',
        'fecha_alta',
        'fecha_mod',
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->id),array("view","id"=>$data->id))',
        ),
    ),
)); ?>