<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vehiculo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


    <?php echo $form->labelEx($model, 'modeloid'); ?>
	<?php echo $form->dropDownList($model,'modeloid', $model->getListaModelos());?>
    <br/>
    <?php echo $form->labelEx($model, 'motorid'); ?>
	<?php echo $form->dropDownList($model,'motorid', $model->getListaMotores()); ?>

<!--	--><?php /*echo $form->textFieldRow($model,'transmision',array('class'=>'span5','maxlength'=>45)); */?>

    <?php echo $form->labelEx($model, 'transmision'); ?>
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => 'primary',
        'toggle' => 'radio', // 'checkbox' or 'radio'
        'buttons' => array(
            array('label'=>'Manual', 'htmlOptions' => array(
                'data-field' => 'Vehiculo_transmision',
                'data-value' => 'Manual',
            )),
            array('label'=>'Automática', 'htmlOptions' => array(
                'data-field' => 'Vehiculo_transmision',
                'data-value' => 'Automática',
            )),
        ),
    )); ?>
    <?php echo $form->hiddenField($model, 'transmision'); ?>
<br/>
<br/>

	<?php echo $form->labelEx($model,'color'); ?>
    <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
        'model' => $model,
        'attribute' => 'color',
        'hidden'=>true, // defaults to false - can be set to hide the textarea with the hex
        'options' => array(), // jQuery plugin options
        'htmlOptions' => array(), // html attributes
    ));?>
<br/>
<br/>

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
