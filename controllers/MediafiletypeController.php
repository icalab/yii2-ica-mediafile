<?php

namespace icalab\mediafile\controllers;
use Yii;
use icalab\mediafile\MediafileModule;
use yii\web\Controller;
use icalab\mediafile\models\Mediafiletype;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class MediafiletypeController extends Controller
{
    /**
     * List all media file types.
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Mediafiletype::find()->orderBy('LOWER(name)'),
                'pagination' => [
                    'pageSize' => 20,
                ]
            ]);
        return $this->render('@icalab/mediafile/views/mediafiletype/index', ['dataProvider' => $dataProvider]);
    }

    /**
     * Create a new media file type. If creation is successful, the browser
     * will be redirected to the 'update' page.
     */
    public function actionCreate()
    {
        $model = new Mediafiletype();
        
        if(null !== yii::$app->request->post('Mediafiletype'))
        {
            $model->attributes = Yii::$app->request->post('Mediafiletype');
            if($model->save())
            {
                $this->redirect(['update', 'id' => $model->primaryKey]);
            };
        }
        return $this->render('@icalab/mediafile/views/mediafiletype/create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Mediafiletype::findOne(['id' => $id]);
        if(null === $model)
        {
            throw new NotFoundHttpException(Yii::t('mediafile', 'No such media file type.'));
        }

        if(null !== yii::$app->request->post('Mediafiletype'))
        {
            $model->attributes = Yii::$app->request->post('Mediafiletype');
            $model->save();
        }

        return $this->render('@icalab/mediafile/views/mediafiletype/update', ['model' => $model]);
    }



}
