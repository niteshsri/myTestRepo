<?php
use Migrations\AbstractSeed;

/**
 * WorkTypes seed.
 */
class WorkTypesSeed extends AbstractSeed
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
        [ 'name'    => 'full_time',
        'label'   =>'Full TIme',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'part_time',
        'label'   =>'Part Time',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'freelancer',
        'label'   =>'FreeLancer',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'contractual',
        'label'   =>'Contractual',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ]       
        ];


        $table = $this->table('work_types');
        $table->insert($data)->save();
    }
}
