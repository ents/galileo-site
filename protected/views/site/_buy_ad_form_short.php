<?php
/* @var $this AdController */
/* @var $model Ad */
/* @var $form CActiveForm */
?>

<div class="form" style="max-width: 400px; margin: 50px auto; padding: 10px; text-align: center; box-shadow: green 0px 0px 10px 2px; border-radius: 5px">
    <h2>Заказать строку прямо сейчас на хакатоне!</h2>
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'enableAjaxValidation'=>false,
    )); ?>
    <?/** @var $form TbActiveForm */?>
    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'string'); ?>
    <?php echo TbHtml::button('Попробовать', array('size'=>TbHtml::BUTTON_SIZE_LARGE, 'type' => 'submit')); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->