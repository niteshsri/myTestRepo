<?php
use Migrations\AbstractSeed;

/**
 * Languages seed.
 */
class LanguagesSeed extends AbstractSeed
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
        [ 'name'    => 'english',
        'label'   =>'English',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),
        ],
        [ 'name'    => 'hindi',
        'label'   =>'Hindi',
        'status'=> 1,
        'created' => date('Y-m-d H:i:s'),
        'modified'=> date('Y-m-d H:i:s'),]          
        ];

        $table = $this->table('languages');
        $table->insert($data)->save();
    }
}
