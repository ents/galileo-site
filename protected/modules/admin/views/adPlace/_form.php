<?php
/* @var $this AdPlaceController */
/* @var $model AdPlace */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-place-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div style="float: left; width: 40%">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'title'); ?>

        <?php echo $form->labelEx($model,'text'); ?>
        <?php echo $form->textArea($model,'text',array('size'=>60, 'rows' => 5, 'maxlength'=>255)); ?>
        <?php echo $form->error($model,'text'); ?>

        <?php echo $form->labelEx($model,'lon'); ?>
        <?php echo $form->textField($model,'lon', ['readonly' => 'readonly']); ?>
        <?php echo $form->error($model,'lon'); ?>

        <?php echo $form->labelEx($model,'lat'); ?>
        <?php echo $form->textField($model,'lat', ['readonly' => 'readonly']); ?>
        <?php echo $form->error($model,'lat'); ?>
    </div>

    <div style="float: left; width: 59%">
        <h3>Укажите место рекламы</h3>
        <?php
        $this->widget('ext.yandexmap.YandexMap',array(
            'id'=>'map',
            'width'=>'100%',
            'height'=>400,
            'center'=>array($model->lat ?: 55.76, $model->lon ?: 37.64),
            'controls' => array(
            'zoomControl' => true,
            'typeSelector' => true,
            'mapTools' => true,
            'smallZoomControl' => false,
            'miniMap' => false,
            'scaleLine' => true,
            'searchControl' => true,
            'trafficControl' => false,
            ),
        ));
        ?>
    </div>
    <script type="text/javascript">
        ymaps.ready(function(){
            setTimeout(function(){
                var myGeoObjects = [];
                var placeMark = new ymaps.Placemark([55.75,37.62],{},{'draggable':true});
                placeMark.events.add("drag", function(a, b){
                    $('[name="AdPlace[lat]"]').val(placeMark.geometry.getCoordinates()[0]);
                    $('[name="AdPlace[lon]"]').val(placeMark.geometry.getCoordinates()[1]);
                });
                $('[name="AdPlace[lat]"]').val(placeMark.geometry.getCoordinates()[0]);
                $('[name="AdPlace[lon]"]').val(placeMark.geometry.getCoordinates()[1]);
                myGeoObjects.push(placeMark);
                clusterer = new ymaps.Clusterer({clusterDisableClickZoom: true, gridSize:96});
                clusterer.add(myGeoObjects);
                map.geoObjects.add(clusterer);
            }, 0);
        })
    </script>

    <div style="clear: both"></div>

    <div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->