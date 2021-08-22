<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems[]|\Cake\Collection\CollectionInterface $equipmentItems
 */

$this->Html->scriptStart(['block' => true]);
echo "document.addEventListener('DOMContentLoaded', function() {
    function selected(date) {
        console.log(date);
    }
    var options = {format:'dd mm yyyy', onSelect: selected};
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });";
$this->Html->scriptEnd()
?>

           <!--- <div>
               <span>Campus Filter:</span>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET" style="display:inline;">
                    <button type="submit" value = "filter">All</button>
                    <button type="submit" >Cairns</button>
                    <button type="submit">Bundaberg</button>
                    <button type="submit">Melbourne</button>
                    <button type="submit" value = "Rockhampton">Rockhampton</button>
                </form>
            </div> --->
                <!---<?= $this->Html->link(__('Filter'), ['action' => 'filter'], ['class' => 'button float-right']) ?>

                <?= $this->Form->postLink('Click',['controller' => 'EquipmentItems', 'action' => 'filter', 'cairns']);?> -

             <h3><?= __('') ?></h3>

    <!-- Under the h3 Equipment Itmes is where drop down v1.0 needs to go -->


    <?= $this->Form->postButton('Cairns',['controller' => 'EquipmentItems', 'action' => 'filter', 'cairns']);?>
    <?= $this->Form->postButton('Bundaberg',['controller' => 'EquipmentItems', 'action' => 'filter', 'bundaberg']);?>
    <?= $this->Form->postButton('Melbourne',['controller' => 'EquipmentItems', 'action' => 'filter', 'melbourne' ]);?>
    <?= $this->Form->postButton('Rockhampton',['controller' => 'EquipmentItems', 'action' => 'filter', 'rockhampton']);?>

<select name = "campus">
    <?php

    $mysqli = NEW MySQLi('localhost','root','','cqulabmanager');

    $resultSet = $mysqli->query("SELECT DISTINCT equipment_campus FROM equipment_items");

        while($rows = $resultSet -> fetch_assoc())
        {
            $equipment_campus = $rows['equipment_campus'];      
            echo "<option value = '$equipment_campus'>$equipment_campus</option>";
        }

    ?>
</select>
<button type = "submit" value = $campus>Submit</button>


<div class="equipmentItems index content">
    <?= $this->Html->link(__('New Equipment Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Equipment Items') ?></h3>


    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('equipment_id') ?></th>
                    <th><?= $this->Paginator->sort('equipment_name') ?></th>
                    <th><?= $this->Paginator->sort('equipment_campus') ?></th>
                    <th><?= $this->Paginator->sort('equipment_lab') ?></th>
                    <th><?= $this->Paginator->sort('equipment_discipline') ?></th>
                    <th><?= $this->Paginator->sort('equipment_details') ?></th>
                    <th><?= $this->Paginator->sort('equipment_media') ?></th>
                    <th><?= $this->Paginator->sort('equipment_whs') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipmentItems as $equipmentItems): ?>
                    <?php if ($equipmentItems->equipment_status == '1'): ?>
                        <tr>
                            <td><?= $this->Number->format($equipmentItems->equipment_id) ?></td>
                            <td><?= h($equipmentItems->equipment_name) ?></td>
                            <td><?= h($equipmentItems->equipment_campus) ?></td>
                            <td><?= h($equipmentItems->equipment_lab) ?></td>
                            <td><?= h($equipmentItems->equipment_discipline) ?></td>
                            <td><?= h($equipmentItems->equipment_details) ?></td>
                            <td><?= h($equipmentItems->equipment_media) ?></td>
                            <td><?= h($equipmentItems->equipment_whs) ?></td>
                            <td><?= $this->Number->format($equipmentItems->equipment_status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $equipmentItems->equipment_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipmentItems->equipment_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentItems->equipment_id)]) ?>
                                <?= $this->Form->postLink(__('Book'), ['action' => 'book', $equipmentItems->equipment_id]) ?> <!-- Lab Booking Button -->
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
<!--
<div class="card-panel teal lighten-2">
    <?= $this->Form->create($labBookings) ?>
    <?php
        echo $this->Form->text('booking_date', ['class' => 'datepicker', 'placeholder' => 'Booking Date']);
        echo $this->Form->text('date_return', ['class' => 'datepicker', 'placeholder' => 'Return Date']);
    ?>
    <?= $this->Form->postLink(__('Book'), ['action' => 'book', $equipmentItems->equipment_id]) ?>
    <?= $this->Form->end() ?>
</div>
-->
