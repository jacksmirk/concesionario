<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'qp-pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <b><?php echo CHtml::encode($model->getAttributeLabel('quickpoll_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($model->quickpoll_id),array('quickpoll/view','id'=>$model->quickpoll_id)); ?>
    <?php echo $form->hiddenField($model,'quickpoll_id'); ?>
    <br />
    <b><?php echo CHtml::encode($model->getAttributeLabel('page_number')); ?>:</b>
    <?php echo CHtml::encode($model->page_number); ?>

	<?php echo $form->hiddenField($model,'page_number'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar y añadir pregunta' : 'Actualizar',
		)); ?>

	</div>

<?php $this->endWidget(); ?>
