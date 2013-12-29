<?php
$this->breadcrumbs=array(
	'Tipos de Motores',
);

$this->menu=array(
	array('label'=>'Nuevo Tipo de Motor','url'=>array('create')),
	array('label'=>'Administra Tipos de Motores','url'=>array('admin')),
);
?>

<h1>Tipos de Motores</h1>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'grid1',
    'itemsCssClass'=>'table table-bordered table-condensed',
    'dataProvider' => $dp,
    'extraRowColumns' => array('tipo'),
    'mergeColumns' => array('fuente'),
    'columns' => array(
        'fuente',
        array(
            'name'=>'id',
            'type'=>'raw',
            'value'=>'CHtml::link(CHtml::encode($data->id),array("view","id"=>$data->id))',
        ),
    ),
)); ?>