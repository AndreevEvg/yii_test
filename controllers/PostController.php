<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\TestForm;

class PostController extends AppController
{
    public $layout = 'basic';
    
    public function beforeAction($action) 
    {
        if($action->id == 'index'){
            $this->enableCsrfValidation = false;
        }
        
        return parent::beforeAction($action);
    }
    
    public function actionIndex()
    {   
        //$posts = Post::find()->select('id, title, excerpt')->orderBy('id DESC')->all();
        
        if(Yii::$app->request->isAjax){
            debug(Yii::$app->request->post());
            return 'test';
        }
        
        //Пагинация постов
        $query = Post::find()->select('id, title, excerpt')->orderBy('id DESC');
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('index', [
            'posts' => $posts,
            'pages' => $pages,
        ]);
    }
    
    public function actionView()
    {
        $this->layout = 'main';
        
        $id = Yii::$app->request->get('id');
        $post = Post::findOne($id);
        if(empty($post)) throw new \yii\web\HttpException(404, 'Такой страницы нет!');
        
        return $this->render('view', [
            'post' => $post,
        ]);
    }
   
    public function actionTest()
    {   
        $var = 'Hello Test';
        $arr = ['Иванов', 'Петров', 'Сидоров'];
        
        $model = new TestForm();
        
        
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                Yii::$app->session->setFlash('contactFormSubmitted');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('contactFormError');
            }
                     
        }
        
        return $this->render('test', [
            'var' => $var,
            'arr' => $arr,
            'model' => $model,
        ]);
    }
    
    public function actionShow()
    {
        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);
        
        $show = 'Action Show';
        
        return $this->render('show', [
            'show' => $show,
        ]);
    }
}
