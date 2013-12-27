<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('clientid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->clientid),array('view','id'=>$data->clientid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cif')); ?>:</b>
	<?php echo CHtml::encode($data->cif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_contacto); ?>
	<br />


</div>