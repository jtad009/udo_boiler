<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity
 *
 * @property float $default_retail_markup
 * @property float $default_wholesale_markup
 * @property int $default_item_threshold
 * @property int $expiry_notification
 * @property int $location_id
 * @property \Cake\I18n\Time $created
 * @property int $id
 * @property int $po_collection_notification
 * @property int $supplier_payment_notification
 * @property string $company_id
 * @property bool $is_default
 * @property string $inventory_type
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Company $company
 */
class Setting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
