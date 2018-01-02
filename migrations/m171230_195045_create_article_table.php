<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 * Has foreign keys to the tables:
 *
 * - `author`
 * - `category`
 */
class m171230_195045_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'short_body' => $this->text(),
            'body' => $this->text(),
            'author_id' => $this->integer(),
            'category_id' => $this->integer(),
            'date' => $this->date(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-article-author_id',
            'article',
            'author_id'
        );

        // add foreign key for table `author`
        $this->addForeignKey(
            'fk-article-author_id',
            'article',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-article-category_id',
            'article',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-article-category_id',
            'article',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `author`
        $this->dropForeignKey(
            'fk-article-author_id',
            'article'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-article-author_id',
            'article'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-article-category_id',
            'article'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-article-category_id',
            'article'
        );

        $this->dropTable('article');
    }
}
