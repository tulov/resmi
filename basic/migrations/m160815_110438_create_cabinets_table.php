<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cabinets`.
 */
class m160815_110438_create_cabinets_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $table = 'cabinets';
        $this->createTable($table, [
            'id' => $this->primaryKey(),
            'number'=>$this->string(15),
        ]);
        $this->insert($table,[
            'number'=>'100'
        ]);
        $this->insert($table,[
            'number'=>'101'
        ]);
        $this->insert($table,[
            'number'=>'102'
        ]);
        $this->insert($table,[
            'number'=>'103'
        ]);
        $this->insert($table,[
            'number'=>'104'
        ]);
        $this->insert($table,[
            'number'=>'200'
        ]);
        $this->insert($table,[
            'number'=>'201'
        ]);
        $this->insert($table,[
            'number'=>'202'
        ]);
        $this->insert($table,[
            'number'=>'203'
        ]);
        $this->insert($table,[
            'number'=>'204'
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cabinets');
    }
}
