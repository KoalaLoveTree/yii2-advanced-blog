<?php

use common\models\Comment;
use common\models\Post;
use common\models\User;
use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m180311_090957_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(Comment::tableName(), [
            'id' => $this->primaryKey(),
            'post_id'=> $this->integer()->unsigned(),
            'author_id'=>$this->integer()->unsigned(),
            'content' => $this->text(),
            'publication_date' => $this->dateTime()->defaultExpression('NOW()'),
            'status' => $this->smallInteger()->notNull()->defaultValue(5),
        ]);

        $this->addForeignKey(
            'fk-comments-post_id',
            Comment::tableName(),
            'post_id',
            Post::tableName(),
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comments-author_id',
            Comment::tableName(),
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
        $this->dropTable(Comment::tableName());
    }
}
