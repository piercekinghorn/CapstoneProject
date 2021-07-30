<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Labbooking[]|\Cake\Collection\CollectionInterface $labbooking
 */
?>
<div class="labbooking index content">
    <?= $this->Html->link(__('New Labbooking'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Labbooking') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('book_id') ?></th>
                    <th><?= $this->Paginator->sort('equip_ID') ?></th>
                    <th><?= $this->Paginator->sort('staff_ID') ?></th>
                    <th><?= $this->Paginator->sort('student_ID') ?></th>
                    <th><?= $this->Paginator->sort('date_') ?></th>
                    <th><?= $this->Paginator->sort('book_status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($labbooking as $labbooking): ?>
                <tr>
                    <td><?= $this->Number->format($labbooking->book_id) ?></td>
                    <td><?= $this->Number->format($labbooking->equip_ID) ?></td>
                    <td><?= $this->Number->format($labbooking->staff_ID) ?></td>
                    <td><?= $this->Number->format($labbooking->student_ID) ?></td>
                    <td><?= h($labbooking->date_) ?></td>
                    <td><?= h($labbooking->book_status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $labbooking->book_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $labbooking->book_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $labbooking->book_id], ['confirm' => __('Are you sure you want to delete # {0}?', $labbooking->book_id)]) ?>
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
