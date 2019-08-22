<?php

use Phinx\Migration\AbstractMigration;

class CategoryMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('category', ['signed' => false]);
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('slug', 'string', ['limit' => 255, 'null' => false])
              ->create();

              $table = $this->table('post_category', ['id' => false, 'primary_key' => ['post_id', 'category_id']]);
              $table->addColumn('post_id', 'integer', ['signed' => false])
                    ->addForeignKey('post_id', 'post', 'id', ['delete' => 'CASCADE', 'update' => 'RESTRICT', 'constraint' => 'fk_post'])
                    ->addColumn('category_id', 'integer', ['signed' => false])
                    ->addForeignKey('category_id', 'category', 'id', ['delete' => 'CASCADE', 'update' => 'RESTRICT', 'constraint' => 'fk_category'])
                    ->create();
    }
}
