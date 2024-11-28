<?php

use yii\db\Migration;

/**
 * Class m241128_192946_add_date_to_comment
 */
class m241128_192946_add_date_to_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241128_192946_add_date_to_comment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241128_192946_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
