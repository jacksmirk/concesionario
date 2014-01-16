<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'qp-choices-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'question_id'); ?>

	<?php echo $form->dropDownListRow($model,'destination_page_id',$model->pages_array, array('empty'=>'Ninguna')); ?>

	<?php echo $form->textFieldRow($model,'label',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'votes',array('class'=>'span5')); ?>
    <?php echo $form->dropDownListRow($model, 'order_number', $model->order_array); ?>

	<?php //echo $form->textFieldRow($model,'order_number',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
