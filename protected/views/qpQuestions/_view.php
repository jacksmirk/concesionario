<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('order_number')); ?>:</b>
    <?php echo CHtml::encode($data->getOrden()); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->answerType->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->label),array('view','id'=>$data->id)); ?>
	<br />
    <p>&nbsp;</p>

</div>