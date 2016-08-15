<?php

use yii\db\Migration;

/**
 * Handles the creation for table `doctors`.
 */
class m160815_110714_create_doctors_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $table = 'doctors';
        $this->createTable($table, [
            'id' => $this->primaryKey(),
            'first_name'=>$this->string(256)->notNull(),
            'last_name'=>$this->string(256)->notNull(),
            'patronymic'=>$this->string(256),
            'phone'=>$this->string(36)->notNull(),
            'cabinet_id'=>$this->integer()->notNull(),
            'post_id'=>$this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_cabinet_id',
            $table,
            'cabinet_id',
            'cabinets',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ix_cabinet_id',
            $table,
            'cabinet_id'
        );
        $this->addForeignKey(
            'fk_post_id',
            $table,
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ix_post_id',
            $table,
            'post_id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $table = 'doctors';
        $this->dropForeignKey('fk_post_id',$table);
        $this->dropIndex('ix_post_id',$table);
        $this->dropForeignKey('fk_cabinet_id',$table);
        $this->dropIndex('ix_cabinet_id',$table);
        $this->dropTable($table);
    }
}
