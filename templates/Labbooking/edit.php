<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Labbooking $labbooking
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $labbooking->book_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $labbooking->book_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Labbooking'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="labbooking form content">
            <?= $this->Form->create($labbooking) ?>
            <fieldset>
                <legend><?= __('Edit Labbooking') ?></legend>
                <?php
                    echo $this->Form->control('equip_ID');
                    echo $this->Form->control('staff_ID');
                    echo $this->Form->control('student_ID');
                    echo $this->Form->control('date_');
                    echo $this->Form->control('book_status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
