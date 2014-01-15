<?php
$this->breadcrumbs=array(
	'Qp Pages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Ver Páginas','url'=>array('index','quickpoll_id'=>$model->quickpoll_id)),
	array('label'=>'Nueva Página','url'=>array('create','quickpoll_id'=>$model->quickpoll_id)),
	array('label'=>'Actualizar Página','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Página','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Páginas','url'=>array('admin','quickpoll_id'=>$model->quickpoll_id)),
    array('label'=>'Añadir Pregunta','url'=>array('qpQuestions/create', 'page_id'=>$model->id)),
    array('label'=>'Ver Preguntas','url'=>array('qpQuestions/index', 'page_id'=>$model->id)),

);
?>

<h1>Ver página #<?php echo $model->page_number; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array('label'=>'Quick Poll',
            'name'=>'quickpoll.name',
        ),
		//'page_number',
        array('name'=>'Preguntas',
                'type'=>'html',
                'value'=>$model->relatedQuestions,
        ),
	),
)); ?>

