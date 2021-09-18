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
            <?= $this->Form->create($equipmentItems, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Lab Equipment') ?></legend>
                <?php
                    echo $this->Form->control('equipment_name', ['placeholder' => 'Name (Required)', 'label' =>'Name']);
                    echo $this->Form->control('equipment_campus', ['placeholder' => 'Campus (Required)', 'label' =>'Campus']);
                    echo $this->Form->control('equipment_lab', ['placeholder' => 'Laboratory (Required)', 'label' =>'Laboratory']);
                    echo $this->Form->control('equipment_discipline', ['placeholder' => 'Not Required', 'label' =>'Discipline']);
                    echo $this->Form->control('equipment_details', ['placeholder' => 'Category Tags (Not Required)', 'label' =>'Details']);
                    echo $this->Form->control('equipment_media', ['type'=>'file', 'label' =>'Upload jpg/png']);
                    echo $this->Form->control('equipment_whs', ['placeholder' => 'Not Required', 'label' =>'Work Health & Safety']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Edit')) ?>  
            <?= $this->Form->end() ?>
            <?= $this->Form->postLink(__('Delete Media'), ['action' => 'deleteMedia', $equipmentItems->equipment_id])?>
        </div>
    </div>
</div>
