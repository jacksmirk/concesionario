<?php
$this->breadcrumbs=array(
	'Fabricantes',
);

$this->menu=array(
	array('label'=>'Create Fabricante','url'=>array('create')),
	array('label'=>'Manage Fabricante','url'=>array('admin')),
);
?>

<h1>Fabricantes</h1>
<!--
--><?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>

<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'grid1',
    'itemsCssClass'=>'table table-bordered table-condensed',
    'dataProvider' => $dataProvider,
    'extraRowColumns' => array('nombre'),
    'mergeColumns' => array('telefono'),
    'columns' => array(
        'email',
        'fecha_alta',
        'fecha_mod',
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->id),array("view","id"=>$data->id))',
        ),
    ),
)); ?>