<?php
use Migrations\AbstractSeed;

/**
 * Hobbies seed.
 */
class HobbiesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
        [ 'name'    => 'reading',
        'label'   =>'reading',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'dancing',
        'label'   =>'reading',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),]          
        ];

        $table = $this->table('hobbies');
        $table->insert($data)->save();
    }
}
