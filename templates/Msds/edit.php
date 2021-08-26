<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Msd $msd
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $msd->doc_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $msd->doc_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Msds'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="msds form content">
            <?= $this->Form->create($msd) ?>
            <fieldset>
                <legend><?= __('Edit Msd') ?></legend>
                <?php
                    echo $this->Form->control('doc_url');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
