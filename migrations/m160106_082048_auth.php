<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * CREATE TABLE `auth` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,
 * `user_id` int(11) NOT NULL,
 * `source` varchar(255) CHARACTER SET utf8 NOT NULL,
 * `source_id` varchar(255) CHARACTER SET utf8 NOT NULL,
 * PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
 */
class m160106_082048_auth extends Migration {

    public function up() {
        $this->createTable('auth', array(
            'id' => "pk",
            'user_id' => 'integer NOT NULL',
            'source' => "string NOT NULL",
            'source_id' => "string NOT NULL",
        ));
        return TRUE;
    }

    public function down() {
        echo "m160106_082048_auth cannot be reverted.\n";

        return false;
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
