<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehiculoid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vehiculoid),array('view','id'=>$data->vehiculoid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_puertas')); ?>:</b>
	<?php echo CHtml::encode($data->num_puertas); ?>
	<br />


</div>