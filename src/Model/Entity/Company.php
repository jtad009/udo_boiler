<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $owner
 * @property \Cake\I18n\Time $created
 * @property string $code
 * @property string $telephone
 * @property string $logo
 * @property string $email
 * @property bool $status
 * @property string $description
 *
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\Condition[] $conditions
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\DocumentCategory[] $document_categories
 * @property \App\Model\Entity\Document[] $documents
 * @property \App\Model\Entity\ExpenseType[] $expense_types
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\Location[] $locations
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\Supplier[] $suppliers
 * @property \App\Model\Entity\Unit[] $units
 * @property \App\Model\Entity\User[] $users
 */
class Company extends Entity
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
