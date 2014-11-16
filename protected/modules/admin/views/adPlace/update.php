<?php
/* @var $this AdPlaceController */
/* @var $model AdPlace */

$this->breadcrumbs=array(
	'Ad Places'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AdPlace', 'url'=>array('index')),
	array('label'=>'Create AdPlace', 'url'=>array('create')),
	array('label'=>'View AdPlace', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AdPlace', 'url'=>array('admin')),
);
?>

<h1>Update AdPlace <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>