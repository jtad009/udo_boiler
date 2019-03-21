<?php
namespace DocumentControl\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentCategory Entity
 *
 * @property int $id
 * @property string $category
 * @property \Cake\I18n\Time $created
 * @property int $company_id
 * @property int $document_count
 *
 * @property \DocumentControl\Model\Entity\Company $company
 * @property \DocumentControl\Model\Entity\Document[] $documents
 */
class DocumentCategory extends Entity
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
