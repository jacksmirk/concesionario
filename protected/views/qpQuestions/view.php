<?php
$this->breadcrumbs=array(
	'Qp Questions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QpQuestions','url'=>array('index', 'page_id'=>$model->page_id)),
	array('label'=>'Create QpQuestions','url'=>array('create', 'page_id'=>$model->page_id)),
	array('label'=>'Update QpQuestions','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete QpQuestions','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QpQuestions','url'=>array('admin')),
    array('label'=>'Añadir opción de respuesta', 'url'=>array('qpChoices/create'), 'visible'=>$model->answer_type_id<=3),
);
?>

<h1>Ver pregunta #<?php echo $model->orden; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'page_number',
		'answer_type_name',
		'label',
		//'orden',
	),
)); ?>
