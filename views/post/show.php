<?php
use yii\helpers\Html;

//$this->title = 'Одна статья';
$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']);
?>

<?php $this->beginBlock('block1'); ?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock(); ?>

<h1><?= Html::encode($show) ?></h1>
<button id="btn" class="btn btn-success">Click me...</button>

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