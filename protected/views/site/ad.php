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
<h2>Описание</h2>
<p><?=$place->text?></p>

<p style="text-align: center">
    <?php echo TbHtml::button('Заказать рекламу', array('size'=>TbHtml::BUTTON_SIZE_LARGE, 'color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
</p>
