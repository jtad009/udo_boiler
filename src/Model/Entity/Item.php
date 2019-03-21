<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $name
 * @property int $quantity
 * @property int $unit_id
 * @property int $cost_price
 * @property float $markup
 * @property \Cake\I18n\Time $expiration_date
 * @property \Cake\I18n\Time $created
 * @property string $company_id
 * @property int $category_id
 * @property string $product_code
 * @property int $supplier_id
 * @property float $markup_wholesale
 * @property int $threshold
 * @property string $location_id
 * @property bool $expired
 * @property bool $hold
 * @property int $retail_sp
 * @property int $whole_sp
 * @property int $quantity_sold
 * @property string $description
 * @property string $images
 *
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\PurchaseOrder[] $purchase_orders
 * @property \App\Model\Entity\Sale[] $sales
 */
class Item extends Entity
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
