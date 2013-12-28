<?php
$this->breadcrumbs=array(
	'Modelos',
);

$this->menu=array(
	array('label'=>'Create Modelo','url'=>array('create')),
	array('label'=>'Manage Modelo','url'=>array('admin')),
);
?>

<h1>Modelos</h1>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>

<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'grid1',
    'itemsCssClass'=>'table table-bordered table-condensed',
    'dataProvider' => $dataProvider,
    //'extraRowColumns' => array('tipomotor_tipo'),
    'mergeColumns' => array('fabricante_nombre'),
    'columns' => array(
        array(
            'name' => 'fabricante_nombre',
            'value' => '$data->fabricante->nombre',
        ),
        'nombre',
        'fecha_alta',
        'fecha_mod',
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->id),array("view","id"=>$data->id))',
        ),
    ),
)); ?>