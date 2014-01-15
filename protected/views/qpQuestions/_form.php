<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'qp-questions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <h4><?php echo CHtml::encode($model->getAttributeLabel('page_number')); ?>:

    <?php echo CHtml::link(CHtml::encode($model->page_number),array('qpPages/view','id'=>$model->page_id)); ?>
</h4>
<br />

	<?php echo $form->hiddenField($model,'page_id'); ?>
    <?php echo $form->dropDownListRow($model, 'answer_type_id', $model->getTiposRespuesta()); ?>

<?php //echo $form->textFieldRow($model,'answer_type_id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'label',array('class'=>'span5','maxlength'=>255)); ?>

    <?php echo $form->dropDownListRow($model, 'order', $model->order_array); ?>

<?php echo $form->dropDownListRow($model, 'required', array('0'=>'No', '1'=>'Sí',)); ?>

	<?php //echo $form->textFieldRow($model,'order',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
