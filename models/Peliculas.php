<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peliculas".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_genero
 * @property string $director
 * @property string $fecha_lanzamiento
 * @property string $imagen
 *
 * @property Genero $idGenero
 */
class Peliculas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peliculas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'id_genero', 'director'], 'required'],
            [['id_genero'], 'integer'],
            [['fecha_lanzamiento'], 'safe'],
            [['nombre'], 'string', 'max' => 30],
            [['director'], 'string', 'max' => 50],
            [['imagen'], 'string', 'max' => 200],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['id_genero' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'id_genero' => 'Id Genero',
            'director' => 'Director',
            'fecha_lanzamiento' => 'Fecha de Lanzamiento',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGenero()
    {
        return $this->hasOne(Genero::className(), ['id' => 'id_genero']);
    }
}
