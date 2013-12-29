<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'compra-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->labelEx($model,'cliente_nombre'); ?>
	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model,'clienteid',array()); ?>
     <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model,
            'attribute'=>'cliente_nombre',
            'source'=>$this->createUrl('autocompleteClientes'),
            // additional javascript options for the autocomplete plugin
            'options'=>array(
                'showAnim'=>'fold',
                'select'=>"js:function(event, ui) {
        $('#Compra_clienteid').val(ui.item.id);
        }"
            ),
            'cssFile'=>false,
     ));?>

	<?php echo $form->textFieldRow($model,'precio',array('class'=>'span2','append'=>'€')); ?>

    <?php echo $form->labelEx($model,'fecha_compra'); ?>

    <?php
    // widget
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'language'=>'en',
        'model'=>$model,
        'attribute'=>'fecha_compra',
        'flat'=>false,
        'options'=>array(
            'firstDay'=>1,
            'showOn'=>"focus",
            'constrainInput'=>true,
            'currentText'=>'Hoy',
            'dateFormat'=>'yy/mm/dd',
        ),
        'htmlOptions'=>array(
        ),
    ));
    ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
