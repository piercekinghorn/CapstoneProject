<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Msd[]|\Cake\Collection\CollectionInterface $msds
 */
?>
<div class="msds index content">
    
    <h3><?= __('Material Safety Data Sheets') ?></h3>
    <p>MSDS.com.au provides the Safety Data Sheets about chemical products (which may be a hazardous substance and/or dangerous good) required for compliance with OH&S and legislative obligations related to the storage and handling of chemicals through the automated creation of chemical registers (inventories), Dangerous Goods manifests, risk assessments and other documentation required to be maintained. Pesticide information is included and information is kept up to date.
        <br>
        MSDS operates on all web browsers and platforms.
        <br><br>
        Other safety documentation can be found below.
    </p>
    <br>
    <div class="table-responsive">
    <?= $this->Html->link(__('New Document'), ['action' => 'add'], ['class' => 'button']) ?>
        <table>
            <thead>
                <tr class = "tr1">
                    <!-- Document Ids are hidden -->
                    <th><?= $this->Paginator->sort('Document') ?></th>
                    <!--<th><?= $this->Paginator->sort('Name') ?></th>-->
                    <th><?= $this->Paginator->sort('URL') ?></th>
                    <th class="actions"><?= __('Options') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($msds as $msd): ?>
                <tr class = "tr2">
                    <!--<a class="logo" target="_blank" rel="noopener" href="https://my.cqu.edu.au/">MyCQU</a>-->
                    <!--<td><?= $this->Number->format($msd->doc_id) ?></td>-->
                    <td  class = "td1"><?= h($msd->doc_name) ?></td>
                    <td>
                        <?= $this->Html->link(__($msd->doc_url))?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $msd->doc_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $msd->doc_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $msd->doc_id], ['confirm' => __('Are you sure you want to delete # {0}?', $msd->doc_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
