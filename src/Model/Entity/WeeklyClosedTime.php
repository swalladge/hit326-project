<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WeeklyClosedTime Entity
 *
 * @property int $id
 * @property int $weekday
 * @property string $start_time
 * @property string $end_time
 * @property int $entire_day
 * @property string $reason
 * @property int $equipment_id
 *
 * @property \App\Model\Entity\Equipment $equipment
 */
class WeeklyClosedTime extends Entity
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
