<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'motor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<!--    --><?php //$tipos = CHtml::listData(TipoMotor::model()->findAll(), 'id', 'fuente'); ?>

    <?php echo $form->dropDownListRow($model, 'tipomotorid', $model->getListaTipos()); ?>


	<?php echo $form->textFieldRow($model,'cilindrada',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'potencia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'consumo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'emisiones',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
