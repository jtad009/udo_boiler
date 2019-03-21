<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\Time $dob
 * @property int $disease_condition_count
 * @property string $address
 * @property string $company_id
 * @property string $location_id
 * @property string $sex
 * @property string $telephone
 * @property int $condition_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\DiseaseCondition[] $disease_conditions
 * @property \App\Model\Entity\PurchaseOrder[] $purchase_orders
 * @property \App\Model\Entity\Sale[] $sales
 */
class Customer extends Entity
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
