<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->renderPartial("running_line");

$placeMarks = [];
foreach (AdPlace::model()->findAll() as $adPlace) {
    /** @var $adPlace AdPlace*/
    $placeMarks[] = array(
        'lat' => $adPlace->lat,
        'lon' => $adPlace->lon,
        'properties'=>array(
            'balloonContentHeader'=>$adPlace->title,
            'balloonContent'=>$adPlace->text."<br /><a href='".$this->createUrl("site/ad", ["id" => $adPlace->id])."'>Купить это место!</a>",
            'balloonContentFooter'=>'',
        ),
        'options'=>array(
            'draggable'=>false,
        ),
    );
}
$this->widget('ext.yandexmap.YandexMap',array(
    'id'=>'map',
    'width'=>'100%',
    'height'=>600,
    'center'=>array(55.76, 37.64),
    'zoom' => 13,
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
    'placemark' => $placeMarks,
));
?>