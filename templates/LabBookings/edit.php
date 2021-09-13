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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $labBookings->booking_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $labBookings->booking_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Lab Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labBookings form content">
            <?= $this->Form->create($labBookings) ?>
            <fieldset>
                <legend><?= __('Edit Lab Booking') ?></legend>
                <?php
                    echo $this->Form->control('equipment_id', ['type' => 'number', 'placeholder' => 'ID (Required)', 'label' => 'Equipment ID']);
                    echo $this->Form->control('staff_id', ['type' => 'number', 'placeholder' => 'ID (Required)', 'label' => 'Staff ID']);
                    echo $this->Form->control('student_id', ['type' => 'number', 'placeholder' => 'ID (Not Required)', 'label' => 'Student ID']);
                    echo $this->Form->control('booking_date', ['label' => 'Booking Date - Start']);
                    echo $this->Form->control('return_date', ['label' => 'Booking Date - Finish']);
                    echo $this->Form->control('booking_status', ['type' => 'number']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
