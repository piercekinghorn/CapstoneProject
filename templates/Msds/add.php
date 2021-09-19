<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Msd $msd
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Options') ?></h4>
            <?= $this->Html->link(__('Material Safety List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="msds form content">
            <?= $this->Form->create($msd) ?>
            <fieldset>
                <legend><?= __('New safety documentation') ?></legend>
                <?php
                    echo $this->Form->control('doc_name', ['placeholder' => 'Name (Required)', 'label' =>'Name']);
                    echo $this->Form->control('doc_url', ['placeholder' => 'Link (Required)', 'label' =>'URL link']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Add')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
