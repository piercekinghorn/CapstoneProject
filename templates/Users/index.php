<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <h3><?= __('Students') ?></h3>
    <?= $this->Html->link(__('Create New User'), ['action' => 'add'], ['class' => 'button']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id', 'User ID') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('student_id', 'Student ID') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('contact', 'Email') ?></th>
                    <th><?= $this->Paginator->sort('campus') ?></th>
                    <th class="actions"><?= __('Options') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <?php if ($user->is_staff == 0): ?>
                        <tr>
                            <td><?= $this->Number->format($user->user_id) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->password) ?></td>
                            <td><?= h($user->student_id) ?></td>
                            <td><?= h($user->name) ?></td>
                            <td><?= h($user->contact) ?></td>
                            <td><?= h($user->campus) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->user_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<br/>
<div class="users index content">
    <h3><?= __('Staff') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id', 'User ID') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('staff_id', 'Staff ID') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('contact', 'Email') ?></th>
                    <th><?= $this->Paginator->sort('campus') ?></th>
                    <th><?= $this->Paginator->sort('is_admin', 'Administrator') ?></th>
                    <th class="actions"><?= __('Options') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <?php if ($user->is_staff == 1): ?>
                        <tr>
                            <td><?= $this->Number->format($user->user_id) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->password) ?></td>
                            <td><?= h($user->staff_id) ?></td>
                            <td><?= h($user->name) ?></td>
                            <td><?= h($user->contact) ?></td>
                            <td><?= h($user->campus) ?></td>
                            <td> 
                                <?php
                                    if($user->is_admin == 1) {
                                        echo "True";
                                    } else {
                                        echo "False";
                                    }
                                ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->user_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>