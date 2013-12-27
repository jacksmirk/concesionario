<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vehiculo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'fabricanteid',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'modeloid',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'motorid',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'transmision',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'color',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'fecha_fabricacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_alta',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_mod',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'disponible',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
