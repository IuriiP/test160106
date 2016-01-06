<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * CREATE TABLE `fbposts` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,
 * `user_id` int(11) NOT NULL,
 * `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 * `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 * `post_id` varchar(255) NOT NULL,
 * `message` text NOT NULL,
 * PRIMARY KEY (`id`),
 * KEY `user_id` (`user_id`)
 * ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
 */
class m160106_082131_fbposts extends Migration {

    public function up() {
        $this->createTable('fbposts', array(
            'id' => "pk",
            'user_id' => 'integer NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'created_time' => "timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            'post_id' => 'string NOT NULL',
            'message' => 'text NOT NULL',
        ));
        return TRUE;
    }

    public function down() {
        echo "m160106_082131_fbposts cannot be reverted.\n";

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
