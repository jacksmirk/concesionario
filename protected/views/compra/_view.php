<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuentaid')); ?>:</b>
	<?php echo CHtml::encode($data->cuentaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehiculoid')); ?>:</b>
	<?php echo CHtml::encode($data->vehiculoid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metodo_pago')); ?>:</b>
	<?php echo CHtml::encode($data->metodo_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_compra')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_compra); ?>
	<br />


</div>