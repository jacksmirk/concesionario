<?php
$this->breadcrumbs=array(
	'Vehiculos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vehiculo','url'=>array('index')),
	array('label'=>'Create Vehiculo','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vehiculo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vehiculos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'vehiculo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
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
        ),        'color',
        'fecha_fabricacion',
        'fecha_alta',
        'fecha_mod',
        array(
            'name'=>'disponible',
            'value'=>'$data->getDisponible()'
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
