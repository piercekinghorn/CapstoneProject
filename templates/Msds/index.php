<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Msd[]|\Cake\Collection\CollectionInterface $msds
 */
?>
<div class="msds index content">
    <?= $this->Html->link(__('New Msd'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Msds') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('doc_id') ?></th>
                    <th><?= $this->Paginator->sort('doc_url') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($msds as $msd): ?>
                <tr>
                    <td><?= $this->Number->format($msd->doc_id) ?></td>
                    <td><?= h($msd->doc_url) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $msd->doc_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $msd->doc_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $msd->doc_id], ['confirm' => __('Are you sure you want to delete # {0}?', $msd->doc_id)]) ?>
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
