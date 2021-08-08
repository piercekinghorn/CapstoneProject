<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems[]|\Cake\Collection\CollectionInterface $equipmentItems
 */
?>
<div class="equipmentItems index content">
    <?= $this->Html->link(__('New Equipment Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Equipment Items Test Again Take 6') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('equipment_id') ?></th>
                    <th><?= $this->Paginator->sort('equipment_name') ?></th>
                    <th><?= $this->Paginator->sort('equipment_campus') ?></th>
                    <th><?= $this->Paginator->sort('equipment_lab') ?></th>
                    <th><?= $this->Paginator->sort('equipment_discipline') ?></th>
                    <th><?= $this->Paginator->sort('equipment_details') ?></th>
                    <th><?= $this->Paginator->sort('equipment_media') ?></th>
                    <th><?= $this->Paginator->sort('equipment_whs') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipmentItems as $equipmentItems): ?>
                <?php if ($equipmentItems->equipment_status == '1'): ?>
                <tr>
                    <td><?= $this->Number->format($equipmentItems->equipment_id) ?></td>
                    <td><?= h($equipmentItems->equipment_name) ?></td>
                    <td><?= h($equipmentItems->equipment_campus) ?></td>
                    <td><?= h($equipmentItems->equipment_lab) ?></td>
                    <td><?= h($equipmentItems->equipment_discipline) ?></td>
                    <td><?= h($equipmentItems->equipment_details) ?></td>
                    <td><?= h($equipmentItems->equipment_media) ?></td>
                    <td><?= h($equipmentItems->equipment_whs) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $equipmentItems->equipment_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipmentItems->equipment_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentItems->equipment_id)]) ?>
                        <?= $this->Form->postLink(__('Book'), ['action' => 'book', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to Book # {0}?', $equipmentItems->equipment_id)]) ?> <!-- Lab Booking Button -->
                    </td>
                </tr>
                <?php endif; ?>
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
