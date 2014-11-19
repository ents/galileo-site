<?/** @var AdPlace $place */
$this->pageTitle = $place->title;
?>
<h1><?=$place->title?></h1>
<?
$this->widget('ext.yandexmap.YandexMap',array(
    'id'=>'map',
    'width'=>'100%',
    'height'=>400,
    'zoom' => 15,
    'center'=>array($place->lat, $place->lon),
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
    'placemark' => [['lat' => $place->lat, 'lon' => $place->lon]],
));
?>
<br />
<div style="width: 400px; margin: auto; text-align: center">
    <p><?=TbHtml::alert(TbHtml::ALERT_COLOR_INFO, $place->text, ['closeText' => false])?></p>
    <p><?=TbHtml::alert(TbHtml::ALERT_COLOR_DANGER, 'Цена: 10 копеек за показ!', ['closeText' => false])?></p>

    <p style="text-align: center">
        <?php $this->renderPartial('_buy_ad_form', array('model'=>$model)); ?>
    </p>
</div>
