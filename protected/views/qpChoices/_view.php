<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('order_number')); ?>:</b>
    <?php echo CHtml::encode($data->getOrden()); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('label')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->label),array('view','id'=>$data->id)); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_page_id')); ?>:</b>
	<?php if($data->destination_page_id!='')
            echo CHtml::link(CHtml::encode($data->destinationPage->page_number),array('qpPages/view','id'=>$data->destination_page_id));
          else
            echo CHtml::encode('Ninguna'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('votes')); ?>:</b>
	<?php echo CHtml::encode($data->votes!=''?$data->votes:'0'); ?>
	<br />

    <p>&nbsp;</p>

</div>