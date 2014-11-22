<?php /* @var $this Controller */ ?>
<?php Yii::app()->bootstrap->register(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
</head>

<body>

<div class="container" id="page" style="width: auto; max-width: 960px">
    <?php echo TbHtml::tabs(array(
        array(
            'label'=>'Главная', 'url'=>array('/site/index'), 'active' => $this->id=='site'&&($this->action->id=='index' || $this->action->id=='list'),
            'items' => [
                ['label'=>'Реклама на карте', 'url'=>array('/site/index'), 'active' => $this->id=='site'&&$this->action->id=='index',],
                ['label'=>'Реклама списком', 'url'=>array('/site/list'), 'active' => $this->id=='site'&&$this->action->id=='list',],

            ],
        ),
        array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about'), 'active' => $this->id=='site'&&$this->action->id=='page'),
        array('label'=>'Контакты', 'url'=>array('/site/contact'), 'active' => $this->id=='site'&&$this->action->id=='contact'),
        array('label'=>'Моя реклама', 'url'=>array('/ads/my'), 'active' => $this->id=='ads'&&$this->action->id=='my'),
        array('label'=>'Войти', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
    )); ?>

	<?php echo $content; ?>
</div><!-- page -->

</body>
</html>
