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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $labequipment->equip_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $labequipment->equip_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Labequipment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labequipment form content">
            <?= $this->Form->create($labequipment) ?>
            <fieldset>
                <legend><?= __('Edit Labequipment') ?></legend>
                <?php
                    echo $this->Form->control('equip_name');
                    echo $this->Form->control('equip_campus');
                    echo $this->Form->control('equip_lab');
                    echo $this->Form->control('equip_discipline');
                    echo $this->Form->control('equip_details');
                    echo $this->Form->control('equip_media');
                    echo $this->Form->control('equip_whs');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
