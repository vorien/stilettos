<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity.
 *
 * @property int $id
 * @property int $target_id
 * @property \App\Model\Entity\Target $target
 * @property int $section_type_id
 * @property \App\Model\Entity\SectionType $section_type
 * @property int $modifier_id
 * @property \App\Model\Entity\Modifier $modifier
 * @property bool $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Section extends Entity
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
        'id' => false,
    ];
}
