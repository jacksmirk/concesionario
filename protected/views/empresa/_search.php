<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'clientid',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'cif',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
