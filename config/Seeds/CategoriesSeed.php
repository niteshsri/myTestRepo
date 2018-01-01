<?php
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
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
        [ 'name'    => 'body_parts',
        'label'   =>'Body Parts',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'fashion',
        'label'   =>'Fashion',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'high_fashion',
        'label'   =>'High Fashion',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'plus_sized',
        'label'   =>'Plus Sized',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'real_life_and_people',
        'label'   =>'Real Life And People',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'senior',
        'label'   =>'Senior',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ]           
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
