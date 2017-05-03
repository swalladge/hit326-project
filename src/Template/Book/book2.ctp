<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

?>

<p>
    Booking "<?= $equipment->name ?>"
</p>

<form class="form" method="post">

    <div class="form-group">
        <label for="timeslot-input">Select timeslot</label>
        <input class="form-control" type="text" name="timeslot" id="timeslot-input"
               value="<?= $booking->start_date ?>">
    </div>

    <div class="form-group">
        <label for="notes-input">Notes</label>
        <textarea class="form-control" name="notes" id="notes-input"><?= $booking->user_notes ?></textarea>
    </div>

    <input type="hidden" name="id" value="<?= $equipment->id ?>">
    <input class="btn btn-primary" type="submit" value="Submit">
</form>

