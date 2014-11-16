<?php
/* @var $this AdPlaceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ad Places',
);

$this->menu=array(
	array('label'=>'Create AdPlace', 'url'=>array('create')),
	array('label'=>'Manage AdPlace', 'url'=>array('admin')),
);
?>

<h1>Ad Places</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
