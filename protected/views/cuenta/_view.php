<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clienteid')); ?>:</b>
	<?php echo CHtml::encode($data->clienteid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_alta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activa')); ?>:</b>
	<?php echo CHtml::encode($data->activa); ?>
	<br />


</div>