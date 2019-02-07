
<? // $this->title= 'One article'; ?>

<? $this->beginBlock('block1'); ?>
<h1>Pfujkjdjr</h1>
<? $this->endBlock(); ?>

<h1> Show Action </h1>


<button class="btn btn-sucess" id="btn">Click me...</button>
<br>

<!--проходимся в цикле по столбцу таблицы если обьект-->
<?php //foreach ($cats as $cat){
//    echo $cat->title . '<br>';
//} ?>
<!--если массив-->
<!--$cat['title']-->

<!-- работаем с бд-->
<?php debug($cats) ?>

<? //$this->registerJsFile('@web/js/scripts.js',['depends' => ['yii\web\YiiAsset']]) ?>
<? //$this->registerJs("$('.container').append('<p>SHOW !!</p>');", \yii\web\View::POS_LOAD)?>

<? //$this->registerCss('.container{background: #ccc;}') ?>

<?php
$js =  <<<JS
    $('#btn').on('click', function(){
     $.ajax({
     url: 'index.php?r=post/index',
     data: {test: '123'},
     type: 'POST',
     success: function(res){
         console.log(res);
     },
     error: function(){
         alert('Error!');
     }
     });
});
JS;

$this->registerJs($js);

?>

<? ?>