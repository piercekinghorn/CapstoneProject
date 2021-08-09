<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LabBookings[]|\Cake\Collection\CollectionInterface $labBookings
 */
?>
<div class="labBookings index content">
    <?= $this->Html->link(__('New Lab Booking'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lab Bookings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('booking_id') ?></th>
                    <th><?= $this->Paginator->sort('equipment_id') ?></th>
                    <th><?= $this->Paginator->sort('staff_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('booking_date') ?></th>
                    <th><?= $this->Paginator->sort('date_return') ?></th>
                    <th><?= $this->Paginator->sort('booking_status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($labBookings as $labBookings): ?>
                <tr>
                    <td><?= $this->Number->format($labBookings->booking_id) ?></td>
                    <td><?= $this->Number->format($labBookings->equipment_id) ?></td>
                    <td><?= $this->Number->format($labBookings->staff_id) ?></td>
                    <td><?= $this->Number->format($labBookings->student_id) ?></td>
                    <td><?= h($labBookings->booking_date) ?></td>
                    <td><?= h($labBookings->date_return) ?></td>
                    <td><?= h($labBookings->booking_status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $labBookings->booking_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $labBookings->booking_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $labBookings->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $labBookings->booking_id)]) ?> 
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
