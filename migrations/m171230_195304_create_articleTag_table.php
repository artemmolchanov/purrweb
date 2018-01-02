<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articleTag`.
 * Has foreign keys to the tables:
 *
 * - `article`
 * - `tag`
 */
class m171230_195304_create_articleTag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articleTag', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            'idx-articleTag-article_id',
            'articleTag',
            'article_id'
        );

        // add foreign key for table `article`
        $this->addForeignKey(
            'fk-articleTag-article_id',
            'articleTag',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            'idx-articleTag-tag_id',
            'articleTag',
            'tag_id'
        );

        // add foreign key for table `tag`
        $this->addForeignKey(
            'fk-articleTag-tag_id',
            'articleTag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `article`
        $this->dropForeignKey(
            'fk-articleTag-article_id',
            'articleTag'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            'idx-articleTag-article_id',
            'articleTag'
        );

        // drops foreign key for table `tag`
        $this->dropForeignKey(
            'fk-articleTag-tag_id',
            'articleTag'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            'idx-articleTag-tag_id',
            'articleTag'
        );

        $this->dropTable('articleTag');
    }
}
