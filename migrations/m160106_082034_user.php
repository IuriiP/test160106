<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * CREATE TABLE `user` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,
 * `username` varchar(255) NOT NULL,
 * `password` varchar(255) NOT NULL,
 * `email` varchar(255) NOT NULL,
 * `auth_key` varchar(255) NOT NULL,
 * PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
 */
class m160106_082034_user extends Migration {

    public function up() {
        $this->createTable('user', array(
            'id' => "pk",
            'username' => "string NOT NULL",
            'password' => "string NOT NULL",
            'email' => "string NOT NULL",
            'auth_key' => "string NOT NULL",
        ));
        return TRUE;
    }

    public function down() {
        echo "m160106_082034_user cannot be reverted.\n";

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
