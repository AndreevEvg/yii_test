<?php
use yii\helpers\Html;

//$this->title = 'Одна статья';
$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);
?>

<?php $this->beginBlock('block1'); ?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock(); ?>

<button id="btn" class="btn btn-success">Click me...</button>
<br><br>


<?php
echo '<ul class="list-group">';
foreach($cats as $cat){
    echo '<li class="list-group-item">' . $cat->title . '</li>';
    $products = $cat->products;
    foreach($products as $product){
        echo '<ul>';
            echo '<li>' . $product->title . '</li>';
        echo '</ul>';
    }
}
echo '</ul>';
?>
    
<?php
$script = <<< JS
$('#btn').on('click', function(e) {
    $.ajax({
        url: 'post',
        data: {test: '123'},
        type: 'POST',
        success: function(data) {
           console.log(data);
        },
        error: function(){
            alert('Error!');
        }
    });
});
JS;
$this->registerJs($script);
?>