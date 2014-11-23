<?/** @var AdPlace $place */
$this->pageTitle = $place->title;
?>
<div style="float: left; width: 29%;">
    <h1><?=$place->title?></h1>
    <br />
    <p><b>Адрес</b>: <?=$place->text?></p>
    <p><b>Цена</b>: 10 копеек за показ</p>
    <p style="text-align: center">
        <?php $this->renderPartial('_buy_ad_form', array('model'=>$model)); ?>
    </p>
</div>
<div style="float: right; width: 70%">
    <?
    $this->widget('ext.yandexmap.YandexMap',array(
        'id'=>'map',
        'width'=>'100%',
        'height'=>350,
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

</div>
<div style="clear: both"></div>
