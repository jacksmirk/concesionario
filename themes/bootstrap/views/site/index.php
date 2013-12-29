<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

</br>
</br>
<div><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'buttonType'=>'link',
        'url'=>array('motor/index'),
        'size'=>'large',
        'label'=>'Motor',
    )); ?>
    &nbsp;
<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Fabricante',
        'buttonType'=>'link',
        'url'=>array('fabricante/index'),
    )); ?>
    &nbsp;
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Modelo',
        'buttonType'=>'link',
        'url'=>array('modelo/index'),
    )); ?>
    &nbsp;
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Vehiculo',
        'buttonType'=>'link',
        'url'=>array('vehiculo/index'),
    )); ?>
    &nbsp;
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Compra',
        'buttonType'=>'link',
        'url'=>array('compra/index'),
    )); ?>
    &nbsp;
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Cliente',
        'buttonType'=>'link',
        'url'=>array('cliente/index'),
    )); ?>
</div>
<?php $this->endWidget(); ?>


