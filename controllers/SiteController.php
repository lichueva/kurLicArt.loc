<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Article;
use app\models\Category;
use app\models\CommentForm;
use app\models\Tag;
use app\models\TagSearch;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Article::getAll(12);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories
        ]);
    }

    public function actionView($id)
    {
        $article = Article::findOne($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();

        $article->viewedCounter();

        return $this->render('single', [
            'article' => $article,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'comments' => $comments,
            'commentForm' => $commentForm
        ]);
    }

    public function actionCategory($id)
    {

        $data = Category::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();

        return $this->render('category', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories
        ]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->saveComment($id)) {
                Yii::$app->getSession()->setFlash('comment', 'Ваш коментар буде додано найближчим часом після обробки адміністратором!');
                return $this->redirect(['site/view', 'id' => $id]);
            }
        }
    }

    public function actionSearch()
    {
        $searchForm = new \app\models\SearchForm();

        $dataProvider = null;

        if ($searchForm->load(Yii::$app->request->get()) && $searchForm->validate()) {
            $dataProvider = $searchForm->search();
        }

        return $this->render('search', [
            'searchForm' => $searchForm,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSearchByTag($id)
{
    $tag = Tag::findOne($id);

    if (!$tag) {
        throw new \yii\web\NotFoundHttpException('Тег не знайдено');
    }

    $query = $tag->getArticles(); // Статті, пов’язані з тегом

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 10,
        ],
    ]);

    return $this->render('search', [
        'dataProvider' => $dataProvider,
        'searchForm' => new \app\models\SearchForm(), 
        'tagTitle' => $tag->title, 
    ]);
}
}
