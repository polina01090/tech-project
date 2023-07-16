<?php

use yii\db\Migration;

/**
 * Class m230707_092025_book_ct
 */
class m230707_092025_book_ct extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // должности
        $this->createTable('staff', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()
        ]);
        // база с сотрудниками
        $this->createTable('users_staff', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(100)->notNull()->unique(),
            'staff_id' => $this->integer()->notNull()
        ]);
        // учётные записи
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(120)->notNull(),
        ]);
        $this->insert('users', [
            'id' => $this->primaryKey(),
            'username' => 'admin',
            'password' => '$2y$10$Gs3DY8nBMjfG4QVRsY0rruLfQX.x8W/M9/ZKit624aNggwzA7QArm',
        ]);
        // база с клиентами
        $this->createTable('users_client', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(100)->notNull(),
            'seriesNumbers' => $this->integer()->notNull()->unique(),
        ]);
        $this->insert('users_client', [
            'id' => $this->primaryKey(),
            'fio' => 'Иванов Иван Иваович',
            'seriesNumbers' => 1221000000,
        ]);
        // книги
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'article' => $this->string(100)->notNull(),
            'date' => $this->date()->notNull(),
            'author' => $this->string(100)->notNull(),
            'count' => $this->integer()->notNull(),
        ]);
        //выдача книг
        $this->createTable('out_books', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'user_staff_id' => $this->integer()->notNull(),
            'user_client_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'date_deadline' => $this->date()->notNull(),
        ]);
        //возврат книг
        $this->createTable('back_books', [
            'id' => $this->primaryKey(),
            'user_staff_id' => $this->integer()->notNull(),
            'out_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'condition' => $this->string(15)->notNull(),
        ]);
        $this->addForeignKey(
            'fk-users_staff-staff_id',
            'users_staff',
            'staff_id',
            'staff',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-out_books-staff_id',
            'out_books',
            'user_staff_id',
            'users_staff',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-out_books-client_id',
            'out_books',
            'user_client_id',
            'users_client',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-back_books-staff_id',
            'back_books',
            'user_staff_id',
            'users_staff',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-back_books-out_id',
            'back_books',
            'out_id',
            'out_books',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-out_books-book_id',
            'out_books',
            'book_id',
            'books',
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
        echo "m230707_092025_book_ct cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230707_092025_book_ct cannot be reverted.\n";

        return false;
    }
    */
}
