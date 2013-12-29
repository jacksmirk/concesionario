<?php
$this->breadcrumbs=array(
	'Motors',
);

$this->menu=array(
	array('label'=>'Create Motor','url'=>array('create')),
	array('label'=>'Manage Motor','url'=>array('admin')),
);
?>

<h1>Motors</h1>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>

<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'grid1',
    'itemsCssClass'=>'table table-bordered table-condensed',
    'dataProvider' => $dataProvider,
    //'extraRowColumns' => array('tipomotor_tipo'),
    'mergeColumns' => array('tipomotor_tipo','tipomotor_fuente'),
    'columns' => array(
        array(
            'name' => 'tipomotor_tipo',
            'value' => '$data->tipomotor->tipo',
        ),
        array(
            'name' => 'tipomotor_fuente',
            'value' => '$data->tipomotor->fuente',
        ),
        'cilindrada',
        'potencia',
        'consumo',
        'emisiones',
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->id),array("view","id"=>$data->id))',
        ),
    ),
)); ?>