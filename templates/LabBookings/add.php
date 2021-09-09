<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LabBookings $labBookings
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Lab Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labBookings form content">
            <?= $this->Form->create($labBookings) ?>
            <fieldset>
                <legend><?= __('Add Lab Booking') ?></legend>
                <?php
                    echo $this->Form->control('equipment_id', ['type' => 'number', 'label' => 'Equipment ID']);
                    echo $this->Form->control('staff_id', ['type' => 'number', 'label' => 'Staff ID']);
                    echo $this->Form->control('student_id', ['type' => 'number', 'label' => 'Student ID']);
                    echo $this->Form->control('booking_date');
                    echo $this->Form->control('return_date');
                    echo $this->Form->control('booking_status', ['type' => 'number']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
