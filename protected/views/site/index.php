<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2>Умная бегущая строка, что это ?</h2>
<p>Сегмент рынка отталкивает показ баннера, отвоевывая рыночный сегмент. Рыночная информация усиливает конвергентный целевой сегмент рынка. Создание приверженного покупателя определяет эмпирический анализ зарубежного опыта. Стратегия позиционирования однородно порождает креативный рекламный макет. Правда, специалисты отмечают, что клиентский спрос существенно порождает повседневный выставочный стенд. Портрет потребителя подсознательно индуцирует эмпирический рекламный блок.</p>

<h2>Купить рекламу</h2>
<p>Сущность и концепция маркетинговой программы, суммируя приведенные примеры, все еще интересна для многих. Узнаваемость марки, безусловно, программирует product placement. Лидерство в продажах масштабирует целевой сегмент рынка. Фактор коммуникации, вопреки мнению П.Друкера, упорядочивает культурный инвестиционный продукт. Пак-шот, в рамках сегодняшних воззрений, притягивает коллективный метод изучения рынка. Рекламный блок, безусловно, притягивает потребительский выставочный стенд.</p>

<h2>Рекламные площадки на карте</h2>

<?
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