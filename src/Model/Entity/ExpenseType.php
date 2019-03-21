<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExpenseType Entity
 *
 * @property int $id
 * @property string $company_id
 * @property \Cake\I18n\Time $created
 * @property string $type_of_expense
 *
 * @property \App\Model\Entity\Company $company
 */
class ExpenseType extends Entity
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
