<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserTalentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserTalentsTable Test Case
 */
class UserTalentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserTalentsTable
     */
    public $UserTalents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_talents',
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
        'app.user_talent_services',
        'app.talent_services',
        'app.talents',
        'app.services',
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
        $config = TableRegistry::exists('UserTalents') ? [] : ['className' => UserTalentsTable::class];
        $this->UserTalents = TableRegistry::get('UserTalents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserTalents);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
