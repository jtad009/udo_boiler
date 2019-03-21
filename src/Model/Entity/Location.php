<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property string $id
 * @property string $company_id
 * @property string $location
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\CompaniesSm[] $companies_sms
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Expense[] $expenses
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\Miscellaneous[] $miscellaneous
 * @property \App\Model\Entity\PurchaseOrder[] $purchase_orders
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\SupplierPayment[] $supplier_payments
 * @property \App\Model\Entity\Supplier[] $suppliers
 * @property \App\Model\Entity\UserLog[] $user_logs
 * @property \App\Model\Entity\User[] $users
 */
class Location extends Entity
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
