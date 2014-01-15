<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'quickpolls-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>
    <?php echo $form->labelEx($model, 'status'); ?>
    <?php echo $form->dropDownList($model,'status', array(
      '0'=>'Cerrada',
        '1'=>'Abierta',
    )) ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
