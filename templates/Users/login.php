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
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Flash->render() ?>
            <h3>Login</h3>
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Please enter your username and password') ?></legend>
                <?= $this->Form->control('username', ['required' => true]) ?>
                <?= $this->Form->control('password', ['required' => true]) ?>
            </fieldset>
            <?= $this->Form->submit(__('Login')); ?>
            <?= $this->Form->end() ?>

            <?= $this->Html->link("Add User", ['action' => 'add']) ?>
        </div>
    </div>
</div>

