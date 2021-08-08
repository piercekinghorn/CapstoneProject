<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems $equipmentItems
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Equipment Item'), ['action' => 'edit', $equipmentItems->equipment_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Equipment Item'), ['action' => 'delete', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentItems->equipment_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Equipment Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Equipment Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equipmentItems view content">
            <h3><?= h($equipmentItems->equipment_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Equipment Name') ?></th>
                    <td><?= h($equipmentItems->equipment_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Campus') ?></th>
                    <td><?= h($equipmentItems->equipment_campus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Lab') ?></th>
                    <td><?= h($equipmentItems->equipment_lab) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Discipline') ?></th>
                    <td><?= h($equipmentItems->equipment_discipline) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Details') ?></th>
                    <td><?= h($equipmentItems->equipment_details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Media') ?></th>
                    <td><?= h($equipmentItems->equipment_media) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Whs') ?></th>
                    <td><?= h($equipmentItems->equipment_whs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Id') ?></th>
                    <td><?= $this->Number->format($equipmentItems->equipment_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Status') ?></th>
                    <td><?= $this->Number->format($equipmentItems->equipment_status) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
