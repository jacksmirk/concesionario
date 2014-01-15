<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quickpoll_id')); ?>:</b>
	<?php echo CHtml::encode($data->quickpoll_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_number')); ?>:</b>
	<?php echo CHtml::encode($data->page_number); ?>
	<br />


</div>