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
                <?= $this->Form->control('username', ['required' => true]) ?>
                <?= $this->Form->control('password', ['required' => true]) ?>
            </fieldset>
            <?= $this->Html->link("Register", ['action'=> 'add'], ['class' => 'button float-right']) ?>
            <?= $this->Form->submit(__('Login')); ?>
            <?= $this->Form->end() ?>
            
        </div>
    </div>
</div>

