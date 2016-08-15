<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property string $phone
 * @property integer $cabinet_id
 * @property integer $post_id
 *
 * @property Cabinet $cabinet
 * @property Post $post
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'cabinet_id', 'post_id'], 'required'],
            [['cabinet_id', 'post_id'], 'integer'],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 36],
            [['cabinet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cabinet::className(), 'targetAttribute' => ['cabinet_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
            'fio'=>'ФИО',
            'cabinet_id' => 'Кабинет',
            'post_id' => 'Должность',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabinet()
    {
        return $this->hasOne(Cabinet::className(), ['id' => 'cabinet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    public function getFio(){
        return $this->last_name . ' ' . $this->first_name . ($this->patronymic ? ' ' . $this->patronymic : '' );
    }
}
