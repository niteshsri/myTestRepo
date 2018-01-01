<?php
use Migrations\AbstractSeed;

/**
 * Ethinicity seed.
 */
class EthnicitySeed extends AbstractSeed
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
       [
        'name'    => 'Indian',
        'label'   =>'indian',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'white',
        'label'   =>'White',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'black_african_roots',
        'label'   =>'Black/African roots',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'latino_hispanic',
        'label'   =>'Latino/Hispanic',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'native_american',
        'label'   =>'Native American',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'middle_eastern',
        'label'   =>'Middle Eastern',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [
         'name'    => 'chinese',
        'label'   =>'Chinese',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'japanese_korean',
        'label'   =>'Japanese/Korean',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'south_asian',
        'label'   =>'South Asian',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'pacific_islander',
        'label'   =>'Pacific Islander',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 
        'name'    => 'other',
        'label'   =>'Other',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ]              
        ];


        $table = $this->table('ethnicities');
        $table->insert($data)->save();
    }
}
