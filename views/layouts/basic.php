<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    // --><?php //$this->registerCsrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class ="wrap">
    <div class ="container">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><?= Html::a('Главная','/web/') ?></li>
            <li role="presentation"><?= Html::a('Статьи',['post/index']) ?></li>
            <li role="presentation"><?= Html::a('Статья',['post/show']) ?></li>
        </ul>

        <? if(isset($this->blocks['block1'])): ?>
        <? echo $this->blocks['block1'] ?>
        <? endif; ?>

        <?= $content ?>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>