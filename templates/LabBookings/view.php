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
            <?= $this->Html->link(__('Edit Lab Booking'), ['action' => 'edit', $labBookings->booking_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lab Booking'), ['action' => 'delete', $labBookings->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $labBookings->booking_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lab Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lab Booking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labbooking view content">
            <h3><?= h($labBookings->booking_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Booking Number') ?></th>
                    <td><?= $this->Number->format($labBookings->booking_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip ID') ?></th>
                    <td><?= $this->Number->format($labBookings->equipment_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff ID') ?></th>
                    <td><?= $this->Number->format($labBookings->staff_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Student ID') ?></th>
                    <td><?= $this->Number->format($labBookings->student_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Date ') ?></th>
                    <td><?= h($labBookings->booking_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Status') ?></th>
                    <td><?= $labBookings->booking_status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
