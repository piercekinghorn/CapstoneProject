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
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->user_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->user_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($user->user_id) ?></td>
                </tr>
                <?php if ($user->is_staff == 1): ?>
                    <tr>
                        <th><?= __('Staff Id') ?></th>
                        <td><?= $this->Number->format($user->staff_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Admin') ?></th>
                        <td><?php
                                if($user->is_admin == 1) {
                                    echo "True";
                                } else {
                                    echo "False";
                                }
                            ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if ($user->is_staff == 0): ?>
                    <tr>
                        <th><?= __('Student Id') ?></th>
                        <td><?= $this->Number->format($user->student_id) ?></td>
                    </tr>
                <?php endif; ?>
                
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= $this->Number->format($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Campus') ?></th>
                    <td><?= $this->Number->format($user->campus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $this->Number->format($user->contact) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
