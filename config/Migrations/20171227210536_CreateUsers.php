<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('first_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            ]);
        $table->addColumn('last_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 120,
            'null' => false,
            ]);
         $table->addColumn('password', 'string', [
          'default' => null,
          'limit' => 255,
          'null' => false,
          ]);
        $table->addColumn('username', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            ]);
        $table->addColumn('role_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            ]);
        $table->addColumn('uuid', 'uuid', [
            'default' => null,
            'null' => false,
            ]);
        $table->addColumn('profile_image_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            ]);
        $table->addColumn('profile_image_path', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            ]);
        $table->addColumn('profile_image_url', 'text', [
            'default' => null,
            'null' => true,
            ]);
        $table->addColumn('cover_image_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            ]);
        $table->addColumn('cover_image_path', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            ]);
        $table->addColumn('cover_image_url', 'text', [
            'default' => null,
            'null' => true,
            ]);
        $table->addColumn('status', 'boolean', [
            'default' => 1,
            'null' => true,
            ]);
        $table->addColumn('is_talent', 'boolean', [
            'default' => 1,
            'null' => true,
            ]);
        $table->addColumn('is_active', 'boolean', [
            'default' => 1,
            'null' => true,
            ]);
        $table->addColumn('deleted', 'datetime', [
            'default' => null,
            'null' => true,
            ]);
        $table->addColumn('last_login', 'datetime', [
            'default' => null,
            'null' => true,
            ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
            ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
            ]);
        $table->addIndex([
            'email',
            ], [
            'name' => 'EMAIL_INDEX',
            'unique' => true,
            ]);
        $table->create();
    }
}
