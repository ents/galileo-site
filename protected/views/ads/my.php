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
        'count_showed',
    ),
)); ?>
