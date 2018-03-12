<?php

use common\models\Category;
use common\models\Post;
use common\models\User;
use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180311_090744_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(Post::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'category_id' => $this->integer()->unsigned(),
            'author_id' => $this->integer()->unsigned(),
            'title' => $this->string(127),
            'content' => $this->text(),
            'publication_date' => $this->dateTime()->defaultExpression('NOW()'),
        ]);

        $this->addForeignKey(
            'fk-post-category_id',
            Post::tableName(),
            'category_id',
            Category::tableName(),
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-post-author_id',
            Post::tableName(),
            'author_id',
            User::tableName(),
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(Post::tableName());
    }
}
