<?php
/* @var $this AdPlaceController */
/* @var $model AdPlace */

$this->breadcrumbs=array(
	'Ad Places'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AdPlace', 'url'=>array('index')),
	array('label'=>'Create AdPlace', 'url'=>array('create')),
	array('label'=>'Update AdPlace', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdPlace', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdPlace', 'url'=>array('admin')),
);
?>

<h1>View AdPlace #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'title',
		'text',
		'lon',
		'lat',
		'added',
	),
)); ?>
