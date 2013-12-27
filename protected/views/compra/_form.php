<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'compra-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'cuentaid',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'vehiculoid',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'precio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'metodo_pago',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'fecha_compra',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
