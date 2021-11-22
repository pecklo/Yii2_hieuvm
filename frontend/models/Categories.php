<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name Tên danh mục
 * @property string|null $description Mô tả sơ lược
 * @property string|null $image Ảnh mô tả của danh mục(base64)
 * @property int|null $parent_id ID danh mục cha của danh mục hiện tại
 * @property int $status Trạng thái: 1 Đang sử dụng, -1 Không còn sử dụng
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'image', 'extensions' => 'png, jpg'],
            [['status', 'parent_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required'],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'description' => 'Mô tả',
            'image' => 'Ảnh',
            'parent_id' => 'Danh mục cha',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
