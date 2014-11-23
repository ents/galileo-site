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
                return "+$count";;
            },
            'type' => 'html',
        ],
        [
            'header' => 'Температура',
            'value' => function(){
                return '+18.2';
            },
            'type' => 'html',
        ],
        [
            'header' => 'К-во прохожих за сегодня',
            'value' => function(){
                return (int)((time()%1000)/10);
            },
            'type' => 'html',
        ],
        [
            'class' => 'TbButtonColumn',
            'template' => '{delete}',
        ],
    ),
)); ?>


<style>
    .grid-view .table td {
        text-align: center;
    }
    .grid-view .table th {
        text-align: center;
        background: #646869;
        color: white;
    }
    .grid-view .table th a.sort-link{
        color: white;
    }
</style>