<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TalentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TalentsTable Test Case
 */
class TalentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TalentsTable
     */
    public $Talents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.talents',
        'app.talent_services',
        'app.services',
        'app.user_talent_services',
        'app.users',
        'app.roles',
        'app.user_addresses',
        'app.user_details',
        'app.work_types',
        'app.ethinicities',
        'app.eye_colors',
        'app.hair_colors',
        'app.user_disciplines',
        'app.disciplines',
        'app.user_favourites',
        'app.user_followers',
        'app.user_hobbies',
        'app.hobbies',
        'app.user_images',
        'app.user_languages',
        'app.languages',
        'app.user_likes',
        'app.user_locations',
        'app.user_social_connections',
        'app.social_services',
        'app.user_talents',
        'app.user_testimonials',
        'app.user_views'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Talents') ? [] : ['className' => TalentsTable::class];
        $this->Talents = TableRegistry::get('Talents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Talents);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
