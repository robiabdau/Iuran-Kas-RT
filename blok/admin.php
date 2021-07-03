<?php
/* @var $this BlokController */
/* @var $model Blok */

$this->breadcrumbs=array(
	'Blok'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Blok', 'url'=>array('index')),
	array('label'=>'Create Blok', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('blok-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Blok</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php //$this->pr($model->search()->getData()); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'blok-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class' => 'IndexColumn',
			'header' => 'No.',
		),
		array(
			'name' => 'nama',
			'type' => 'raw',
			'value' => 'CHtml::link($data->nama,$data->id)'
		),
		array(
			'name' => 'nama_perumahan',
			'type' => 'raw',
			'value' => 'CHtml::link($data->perumahan->nama,array("perumahan/view", "id" => $data->perumahan->id))'
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
