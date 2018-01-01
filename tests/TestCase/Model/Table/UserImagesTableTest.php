<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserImagesTable Test Case
 */
class UserImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserImagesTable
     */
    public $UserImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_images',
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
        'app.user_languages',
        'app.user_likes',
        'app.user_locations',
        'app.user_social_connections',
        'app.user_talent_services',
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
        $config = TableRegistry::exists('UserImages') ? [] : ['className' => UserImagesTable::class];
        $this->UserImages = TableRegistry::get('UserImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserImages);

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
