<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems $equipmentItems
 */
 use Cake\Core\Configure;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Options') ?></h4>

            <?php
            Configure::restore('signed_in', 'default');
            Configure::restore('is_staff', 'default');
            $is_staff = Configure::read('is_staff');
                if ($is_staff == true) {
                  echo $this->Html->link(__('New Equipment'), ['action' => 'add'], ['class' => 'side-nav-item']);
                  echo $this->Html->link(__('Edit Item'), ['action' => 'edit', $equipmentItems->equipment_id], ['class' => 'side-nav-item']);
                  echo $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete {0}?', $equipmentItems->equipment_name), 'class' => 'side-nav-item']);
                }?>
            <?= $this->Html->link(__('Equipment List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equipmentItems view content">
            <h3><?= h($equipmentItems->equipment_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Equipment Item') ?></th>
                    <td><?= h($equipmentItems->equipment_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Campus') ?></th>
                    <td><?= h($equipmentItems->equipment_campus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Laboratory') ?></th>
                    <td><?= h($equipmentItems->equipment_lab) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discipline') ?></th>
                    <td><?= h($equipmentItems->equipment_discipline) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Location') ?></th>
                    <td><?= h($equipmentItems->equipment_location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Details') ?></th>
                    <td><?= h($equipmentItems->equipment_details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td>
                        <?php
                            if (!empty($equipmentItems->equipment_media)) {
                                echo $this->Html->image($equipmentItems->equipment_media, ['height' => 500, 'width' => 500]);
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Work, Health & Safety') ?></th>
                    <td><?= h($equipmentItems->equipment_whs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Id') ?></th>
                    <td><?= $this->Number->format($equipmentItems->equipment_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
