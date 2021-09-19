<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LabBookings $labBookings
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Options') ?></h4>
            <?= $this->Html->link(__('List Lab Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labBookings form content">
            <?= $this->Form->create($labBookings) ?>
            <fieldset>
                <legend><?= __('Add Lab Booking') ?></legend>
                <?php
                    echo $this->Form->control('equipment_id', ['type' => 'number', 'placeholder' => 'ID (Required)', 'label' => 'Equipment ID', 'value' => $labBookings->equipment_id]);
                    echo $this->Form->control('staff_id', ['type' => 'number', 'placeholder' => 'ID (Required)', 'label' => 'Staff ID', 'value' => $labBookings->staff_id]);
                    echo $this->Form->control('student_id', ['type' => 'number', 'placeholder' => 'ID (Not Required)', 'label' => 'Student ID', 'value' => $labBookings->student_id]);
                    echo $this->Form->control('booking_date', ['label' => 'Booking Date - Start', 'value' => $labBookings->booking_date]);
                    echo $this->Form->control('return_date', ['label' => 'Booking Date - Finish', 'value' => $labBookings->return_date]);             
                    echo $this->Form->hidden('booking_status', ['type' => 'number', 'value' => '1']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
