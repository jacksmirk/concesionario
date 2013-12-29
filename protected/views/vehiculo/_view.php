<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fabricanteid')); ?>:</b>
	<?php echo CHtml::encode($data->fabricanteid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modeloid')); ?>:</b>
	<?php echo CHtml::encode($data->modeloid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motorid')); ?>:</b>
	<?php echo CHtml::encode($data->motorid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transmision')); ?>:</b>
	<?php echo CHtml::encode($data->transmision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fabricacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fabricacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_alta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disponible')); ?>:</b>
	<?php echo CHtml::encode($data->disponible); ?>
	<br />

	*/ ?>

</div>