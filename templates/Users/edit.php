<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Options') ?></h4>
            <?= $this->Form->postLink(
                __('Delete User'),
                ['action' => 'delete', $user->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('student_id', ['type' => 'number', 'label' => 'Student ID']);
                ?>
                <div class="switch">
                    <label>
                        <?= $this->Form->control('is_staff', ['type' => 'checkbox', 'label' => 'Staff']) ?>
                        <span class="lever"></span>
                    </label>
                </div>
                <div class="switch">
                    <label>
                        <?= $this->Form->control('is_admin', ['type' => 'checkbox', 'label' => 'Admin']) ?>
                        <span class="lever"></span>
                    </label>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
