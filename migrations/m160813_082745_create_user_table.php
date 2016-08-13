<?php

use yii\db\Migration;

/**
 * Handles the creation for table `users`.
 */
class m160813_082745_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'email' => $this->string(255)->notNull()->unique(),
            'password' => $this->string(60)->notNull(),
            'auth_key' => $this->string(255),
            'access_token' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
