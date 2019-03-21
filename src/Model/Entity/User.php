<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $address
 * @property string $telephone
 * @property bool $status
 * @property string $role
 * @property \Cake\I18n\Time $created
 * @property string $company_id
 * @property string $location_id
 * @property string $md5_password
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Miscellaneous[] $miscellaneous
 * @property \App\Model\Entity\PurchaseOrder[] $purchase_orders
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\UserLog[] $user_logs
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
