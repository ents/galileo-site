<?php
/* @var $this AdsController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'Ads'=>array('/ads'),
	'My',
);

?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $model->search(),
    'filter' => $model,
    'template' => "{items}",
    'columns' => array(
        'string',
        'count_ordered',
        [
            'name' => 'count_showed',
            'value' => function(Ad $ad){
                return TbHtml::progressBar(100*$ad->count_showed/$ad->count_ordered, ['content' => "$ad->count_showed / $ad->count_ordered"]);
            },
            'type' => 'html',
        ],
        [
            'header' => 'За сегодня',
            'value' => function(Ad $ad){
                $sql = "select sum(count) from show_log where ad_id=$ad->id and added > '".date('Y-m-d')."'";
                $count = Ad::model()->getDbConnection()->createCommand($sql)->queryScalar();
                if (!$count) {
                    return "0";
                }
                return TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, "+$count", ['closeText' => false]);
            },
            'type' => 'html',
        ],
    ),
)); ?>
