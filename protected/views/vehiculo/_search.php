<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

    <?php echo $form->labelEx($model, 'modeloid'); ?>
    <?php echo $form->dropDownList($model,'modeloid', $model->getListaModelos());?>
    <br/>
    <?php echo $form->labelEx($model, 'motorid'); ?>
    <?php echo $form->dropDownList($model,'motorid', $model->getListaMotores()); ?>

    <?php echo $form->label($model, 'transmision'); ?>
    <?php echo $form->checkBox($model, 'transmision'); ?>
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

    <?php echo $form->labelEx($model,'fecha_fabricacion'); ?>

    <?php
    // widget
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'language'=>'en',
        'model'=>$model,
        'attribute'=>'fecha_fabricacion',
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
    <div>
        <?php echo $form->labelEx($model, 'disponible'); ?>
        <?php echo $form->checkBox($model, 'disponible'); ?>
    </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
