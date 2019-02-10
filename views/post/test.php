<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Test Action</h1>
<!--вывод об успешной\неуспешной валидации данных на стороне сервера-->
<!--вывод с помощью boot-->
<?php if(Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-warning alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<?
// \app\controllers\debug(Yii::$app);
// \app\controllers\appcontroller\debug(Yii::$app);
//debug(Yii::$app);
//debug($model);

// распечатка для проверки update delete db
//debug($posts);

$form = ActiveForm::begin(['options' => ['id' => 'testForm']]);
?>
<?= $form->field($model, 'name')//->label('Imya')//->passwordInput() ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'text')->textarea(['rows'=>5]) ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<? ActiveForm::end() ?>
