<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fbposts".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $created_at
 * @property string $created_time
 * @property string $post_id
 * @property string $message
 */
class Fbposts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fbposts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id', 'message'], 'required'],
            [['user_id'], 'integer'],
            [['created_at', 'created_time'], 'safe'],
            [['message'], 'string'],
            [['post_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_time' => Yii::t('app', 'Created Time'),
            'post_id' => Yii::t('app', 'Post ID'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * @inheritdoc
     * @return FbpostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FbpostsQuery(get_called_class());
    }
    
    public static function grabSocial(\yii\authclient\BaseOAuth $client) {
        if($client->getId()==='facebook') {
            $token = $client->getAccessToken();
            \Facebook\FacebookSession::enableAppSecretProof(false);
            $session = new \Facebook\FacebookSession($token->getToken());
            $request = new \Facebook\FacebookRequest($session, 'GET', "/me/posts");
            $response = $request->execute()->getResponse();
            $posts = $response->data;
            foreach ($posts as $post) {
                if (!Fbposts::find()->where('post_id = :pid', ['pid' => $post->id])->exists()) {
                    $fbpost = new Fbposts([
                        'user_id'=>Yii::$app->user->id,
                        'post_id'=>$post->id,
                        'message'=>isset($post->message)?$post->message:$post->story,
                        'created_time'=>$post->created_time,
                    ]);
                    $fbpost->save();
                }
            }
        }
    }
}
