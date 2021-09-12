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
            <?= $this->Html->link(__('Equipment List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equipmentItems form content">
            <?= $this->Form->create($equipmentItems, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('New Equipment Item') ?></legend>
                <?php
                //echo $this->Form->control('equipmentFilter', ['placeholder' => 'Equipment keyword', 'label' =>'']);
                    echo $this->Form->control('equipment_name', ['placeholder' => 'Name (Required)', 'label' =>'Name']);
                    echo $this->Form->control('equipment_campus', ['placeholder' => 'Campus (Required)', 'label' =>'Campus']);
                    echo $this->Form->control('equipment_lab', ['placeholder' => 'Laboratory (Required)', 'label' =>'Laboratory']);
                    echo $this->Form->control('equipment_discipline', ['placeholder' => 'Not Required', 'label' =>'Discipline']);
                    echo $this->Form->control('equipment_details', ['placeholder' => 'Category Tags (Not Required)', 'label' =>'Details']);
                    echo $this->Form->control('equipment_media', ['type'=>'file', 'label' =>'Upload jpg/png']);
                    echo $this->Form->control('equipment_whs', ['placeholder' => 'No Required', 'label' =>'Work Health & Safety']);
                    echo $this->Form->control('equipment_status', ['placeholder' => '0 = false, 1 = true', 'label' =>'Booking Status']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Add')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>