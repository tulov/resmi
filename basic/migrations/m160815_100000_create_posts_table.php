<?php

use yii\db\Migration;

/**
 * Handles the creation for table `posts`.
 */
class m160815_100000_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $table = 'posts';
        $this->createTable($table, [
            'id' => $this->primaryKey(),
            'post'=>$this->string(15),
        ]);

        $this->insert($table,[
            'post'=>'терапевт',
        ]);
        $this->insert($table,[
            'post'=>'окулист',
        ]);
        $this->insert($table,[
            'post'=>'уролог',
        ]);
        $this->insert($table,[
            'post'=>'гинеголог',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('posts');
    }
}
