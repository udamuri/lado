<?php

use yii\db\Migration;

class m161229_133813_tbl_options extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('tbl_options', [
            'option_id' => $this->primaryKey(),
            'option_name' => $this->string(200)->notNull(),
            'option_label' => $this->string(200)->notNull(),
            'option_value' => $this->text(),
            'option_autoload' => $this->string(20)->notNull(),
            'option_status' => $this->integer(1)->defaultValue(0),
        ], $tableOptions);

        $this->execute("INSERT INTO `tbl_options` (`option_name`, `option_label`, `option_value`, `option_autoload`, `option_status`) VALUES
                ('_blog_name', 'Website Name', 'Lado Merah', 'text', '1'),
                ('_blog_description', 'Website Description', 'Lado Merah adalah sebuah usaha sosial yang bermitra dengan petani kecil untuk pemasaran hasil panen dari petani', 'textarea', '1'),
                ('_meta_title', 'Meta Title', 'Lado Merah', 'text', '1'),
                ('_meta_description', 'Meta Description', 'Lado Merah Mitra Petani', 'textarea', '1'),
                ('_facebook', 'Facebook (Link)', 'https://facebook.com/muribudiman/', 'text', '2'),
                ('_twitter', 'Twitter (Link)', 'https://twitter.com/muribudiman/', 'text', '2'),
                ('_pinterest', 'Pinterest (Link)', 'https://www.pinterest.com/muribudiman', 'text', '2'),
                ('_dribbble', 'Dribbble (Link)', 'https://dribbble.com/', 'text', '2'),
                ('_meta_keyword', 'Keyword', 'indonesia, jakarta, bukittinggi, yogyakarta, SMA Bukittinggi, SMA Swasta, SMA Muhammadiyah Bukittinggi', 'textarea', '1'),
                ('_email_setting', 'Email', 'udamuri@gmail.com', 'email', '1'),
                ('_password_email', 'Password Email', '123', 'password', '1'),
                ('_flick', 'Flickr feed', '130044503@N03', 'text', '2'),
                ('_feature', 'Feature (Categories ID)', '1', 'text', '1'),
                ('_product', 'Product (Categories ID)', '1', 'text', '1'),
                ('_google_map', 'Google Map (lang, lat)', '-0.316953,100.3850244', 'text', '1');");
    }

    public function down()
    {
        $this->dropTable('tbl_options');
    }

}
