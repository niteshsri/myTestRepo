<?php
use Migrations\AbstractSeed;

/**
 * EyeColors seed.
 */
class EyeColorsSeed extends AbstractSeed
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
        [ 'name'    => 'black',
        'label'   =>' Black',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'blue',
        'label'   =>'Blue',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'brown',
        'label'   =>'Brown',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'dark_brown',
        'label'   =>'Dark Brown',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'green',
        'label'   =>'Green',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'grey',
        'label'   =>'Grey',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'hazel',
        'label'   =>'Hazel',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'lightblue',
        'label'   =>'Light Blue',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'light_brown',
        'label'   =>'Light Brown',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ]   

        ];

        $table = $this->table('eye_colors');
        $table->insert($data)->save();
    }
}
