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
            <?= $this->Html->link(__('Edit Document'), ['action' => 'edit', $msd->doc_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Document'), ['action' => 'delete', $msd->doc_id], ['confirm' => __('Are you sure you want to delete # {0}?', $msd->doc_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Material Safety List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Document'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="msds view content">
            <h3><?= h($msd->doc_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Document') ?></th>
                    <td><?= h($msd->doc_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= $this->Html->link(__($msd->doc_url))?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($msd->doc_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
