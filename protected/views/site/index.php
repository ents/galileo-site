<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?
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
?>
<br />
<h1 style="font-size: 30px; text-align: center">Добро пожаловать в AD-line &ndash; Интерактивная бегущая стока!</h1>
<div style="">
    <p>Новый взгляд на старые технологии или адаптивная, интерактивная бегущая строка с набором расширенных функций.</p>

    <p>Теперь наша бегущая строка это не просто информационное табло с жестко прописанным набором сообщений. А интерактивное устройство, которое в режиме реального времени получает с сервера контент для отображения. Взаимодействует с облаком, куда отчитывается о работе своих датчиков, и с интернет сервисами, что позволяет осуществлять дополнительное информационное наполнение.</p>
    <ul>
        <li>Торговые точки и торговые сети. Управляемая рекламная строка.</li>
        <li>Такси. Реклама, Гео-локационные данные, Система оповещения.</li>
        <li>Общественный транспорт. Реклама, Гео-локационные данные.</li>
        <li>Общественные места. Интерактивные информационные терминалы.</li>
        <li>Система ГО и ЧС. Система оповещения.</li>
    </ul>
</div>

<h3>Выберите пункт на карте: </h3>

<?
$this->widget('ext.yandexmap.YandexMap',array(
    'id'=>'map',
    'htmlOptions' => [
        'style' => 'width: 1080px; height:450px; margin: auto',
    ],
    'center'=>array(55.76, 37.64),
    'zoom' => 11,
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
