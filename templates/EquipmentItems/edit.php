<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems $equipmentItems
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Options') ?></h4>
            <?= $this->Form->postLink(
                __('Delete Item'),
                ['action' => 'delete', $equipmentItems->equipment_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentItems->equipment_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Equipment List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equipmentItems form content">
            <?= $this->Form->create($equipmentItems) ?>
            <fieldset>
                <legend><?= __('Edit Lab Equipment') ?></legend>
                <?php
                    echo $this->Form->control('equipment_name');
                    echo $this->Form->control('equipment_campus');
                    echo $this->Form->control('equipment_lab');
                    echo $this->Form->control('equipment_discipline');
                    echo $this->Form->control('equipment_details');
                    echo $this->Form->control('equipment_media');
                    echo $this->Form->control('equipment_whs');
                    echo $this->Form->control('equipment_status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Edit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
