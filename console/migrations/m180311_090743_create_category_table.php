<?php

use common\models\Category;
use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180311_090743_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(Category::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(127),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(Category::tableName());
    }
}
