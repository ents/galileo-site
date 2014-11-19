<?php
/* @var $this AdController */
/* @var $model Ad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'ad-_buy_ad_form-form',
	'enableAjaxValidation'=>true,
)); ?>
    <?/** @var $form TbActiveForm */?>
    <h2>Купить рекламу!</h2>
	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->numberFieldControlGroup($model,'count_ordered'); ?>
    <?php echo $form->textFieldControlGroup($model,'string'); ?>
    <?php echo TbHtml::button('Заказать рекламу', array('size'=>TbHtml::BUTTON_SIZE_LARGE, 'type' => 'submit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->