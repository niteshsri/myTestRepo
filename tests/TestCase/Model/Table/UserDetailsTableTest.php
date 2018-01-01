<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserDetailsTable Test Case
 */
class UserDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserDetailsTable
     */
    public $UserDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_details',
        'app.users',
        'app.roles',
        'app.user_addresses',
        'app.user_disciplines',
        'app.user_favourites',
        'app.user_followers',
        'app.user_hobbies',
        'app.user_images',
        'app.user_languages',
        'app.user_likes',
        'app.user_locations',
        'app.user_social_connections',
        'app.user_talent_services',
        'app.user_talents',
        'app.user_testimonials',
        'app.user_views',
        'app.work_types',
        'app.ethinicities',
        'app.eye_colors',
        'app.hair_colors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserDetails') ? [] : ['className' => UserDetailsTable::class];
        $this->UserDetails = TableRegistry::get('UserDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserDetails);

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
