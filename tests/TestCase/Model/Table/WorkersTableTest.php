<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkersTable Test Case
 */
class WorkersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkersTable
     */
    public $Workers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.workers',
        'app.service_providers',
        'app.customers',
        'app.users',
        'app.employees',
        'app.bookmarks',
        'app.project_categories',
        'app.projects',
        'app.skill_categories',
        'app.skill_options',
        'app.skills',
        'app.skill_levels',
        'app.histories',
        'app.licenses',
        'app.workers_projects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Workers') ? [] : ['className' => 'App\Model\Table\WorkersTable'];
        $this->Workers = TableRegistry::get('Workers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Workers);

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
