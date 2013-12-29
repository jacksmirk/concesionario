<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipomotorid')); ?>:</b>
	<?php echo CHtml::encode($data->tipomotorid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cilindrada')); ?>:</b>
	<?php echo CHtml::encode($data->cilindrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('potencia')); ?>:</b>
	<?php echo CHtml::encode($data->potencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consumo')); ?>:</b>
	<?php echo CHtml::encode($data->consumo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emisiones')); ?>:</b>
	<?php echo CHtml::encode($data->emisiones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_alta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	*/ ?>

</div>