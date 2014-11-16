<?php
/* @var $this AdPlaceController */
/* @var $model AdPlace */

$this->breadcrumbs=array(
	'Ad Places'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdPlace', 'url'=>array('index')),
	array('label'=>'Manage AdPlace', 'url'=>array('admin')),
);
?>

<h1>Create AdPlace</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>