<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkTypesTable Test Case
 */
class WorkTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkTypesTable
     */
    public $WorkTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.work_types',
        'app.user_details',
        'app.users',
        'app.roles',
        'app.user_addresses',
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
        'app.user_talents',
        'app.services',
        'app.user_testimonials',
        'app.user_views',
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
        $config = TableRegistry::exists('WorkTypes') ? [] : ['className' => WorkTypesTable::class];
        $this->WorkTypes = TableRegistry::get('WorkTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkTypes);

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
