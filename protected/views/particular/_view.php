<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('clientid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->clientid),array('view','id'=>$data->clientid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nif')); ?>:</b>
	<?php echo CHtml::encode($data->nif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />


</div>