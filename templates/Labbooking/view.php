<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Labbooking $labbooking
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Labbooking'), ['action' => 'edit', $labbooking->book_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Labbooking'), ['action' => 'delete', $labbooking->book_id], ['confirm' => __('Are you sure you want to delete # {0}?', $labbooking->book_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Labbooking'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Labbooking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labbooking view content">
            <h3><?= h($labbooking->book_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Book Id') ?></th>
                    <td><?= $this->Number->format($labbooking->book_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip ID') ?></th>
                    <td><?= $this->Number->format($labbooking->equip_ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff ID') ?></th>
                    <td><?= $this->Number->format($labbooking->staff_ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Student ID') ?></th>
                    <td><?= $this->Number->format($labbooking->student_ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date ') ?></th>
                    <td><?= h($labbooking->date_) ?></td>
                </tr>
                <tr>
                    <th><?= __('Book Status') ?></th>
                    <td><?= $labbooking->book_status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
