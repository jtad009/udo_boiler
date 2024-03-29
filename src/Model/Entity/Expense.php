<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expense Entity
 *
 * @property int $id
 * @property string $expenditure_statement
 * @property float $amount
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $location_id
 * @property string $type
 * @property \Cake\I18n\Time $times
 *
 * @property \App\Model\Entity\Location $location
 */
class Expense extends Entity
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
