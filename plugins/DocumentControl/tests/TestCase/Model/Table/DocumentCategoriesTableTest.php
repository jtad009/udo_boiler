<?php
namespace DocumentControl\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use DocumentControl\Model\Table\DocumentCategoriesTable;

/**
 * DocumentControl\Model\Table\DocumentCategoriesTable Test Case
 */
class DocumentCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \DocumentControl\Model\Table\DocumentCategoriesTable
     */
    public $DocumentCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.document_control.document_categories',
        'plugin.document_control.companies',
        'plugin.document_control.documents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DocumentCategories') ? [] : ['className' => 'DocumentControl\Model\Table\DocumentCategoriesTable'];
        $this->DocumentCategories = TableRegistry::get('DocumentCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentCategories);

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
