
<? // $this->title= 'One article'; ?>
<!--Import widget-->
<?php use app\components\MyWidget; ?>
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
<!-- ленивая загрузка - если есть связь - она срабатывает только когда
о ней упоминают -->
<?php // debug($cats) ?>
<!-- cause getProductS -->
<?php //echo count($cats->products) ?>
<?php //debug($cats) ?>
 <!-- greedy -->
<?php //debug($cats) ?>
<?php //echo count($cats[0]->products) ?>

<!-- list - 41 query - lazy; 6 query - greedy -->
<?php //foreach ($cats as $cat) {
//    echo '<ul>';
//    echo '<li>' . $cat->title . '</li>';
//    $products = $cat -> products;
//    foreach ($products as $product) {
//        echo '<ul>';
//        echo '<li>' . $product->title . '</li>';
//        echo '</ul>';
//
//    }
//    echo '</ul>';
//} ?>

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

<!-- Widget -->
<?//php echo MyWidget::widget(['name' => 'Hatiko']); ?>

<!--Вывод пользовательского контента-->
<?php MyWidget::begin() ?>
<h1>o la la!</h1>
<?php MyWidget::end() ?>