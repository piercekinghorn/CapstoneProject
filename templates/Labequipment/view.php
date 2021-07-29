<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Labequipment $labequipment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Labequipment'), ['action' => 'edit', $labequipment->equip_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Labequipment'), ['action' => 'delete', $labequipment->equip_id], ['confirm' => __('Are you sure you want to delete # {0}?', $labequipment->equip_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Labequipment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Labequipment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labequipment view content">
            <h3><?= h($labequipment->equip_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Equip Name') ?></th>
                    <td><?= h($labequipment->equip_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Campus') ?></th>
                    <td><?= h($labequipment->equip_campus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Lab') ?></th>
                    <td><?= h($labequipment->equip_lab) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Discipline') ?></th>
                    <td><?= h($labequipment->equip_discipline) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Details') ?></th>
                    <td><?= h($labequipment->equip_details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Media') ?></th>
                    <td><?= h($labequipment->equip_media) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Whs') ?></th>
                    <td><?= h($labequipment->equip_whs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equip Id') ?></th>
                    <td><?= $this->Number->format($labequipment->equip_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
