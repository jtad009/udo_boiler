<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseOrdersFixture
 *
 */
class PurchaseOrdersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'customer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'client who raised the po', 'precision' => null, 'autoIncrement' => null],
        'item_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'items on the po raised', 'precision' => null],
        'user_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'user who keyed in the po ', 'precision' => null],
        'order_status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '1 to show that po has been approved', 'precision' => null],
        'collection_status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '1 indicates the order has been fullfied and client has picked it up', 'precision' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '1 indicates completed and 0 indicates not completed. it is completed after payment has been made', 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'quantity' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'unit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'payment_status' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'amount_received' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'expected_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'location_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'expected_amount' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'invoice_no' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'customer_id' => 1,
            'item_id' => '88fe2756-1507-4500-a12a-161c0b4b927c',
            'user_id' => 'd51f7402-e954-4f60-8ce0-ebc202a32881',
            'order_status' => 1,
            'collection_status' => 1,
            'status' => 1,
            'created' => 1548318874,
            'modified' => 1548318874,
            'quantity' => 'Lorem ipsum dolor sit amet',
            'unit_id' => 1,
            'payment_status' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'amount_received' => 'Lorem ipsum dolor sit amet',
            'expected_date' => '2019-01-24',
            'location_id' => '27c136c9-f0a6-4bf0-b331-e0f278c2fecd',
            'expected_amount' => 'Lorem ipsum dolor sit amet',
            'invoice_no' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
