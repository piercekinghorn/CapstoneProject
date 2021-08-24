<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems[]|\Cake\Collection\CollectionInterface $EquipmentItems
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


<!-- Filter By Name -->
<h3>Filter By Name</h3>
<?php
    echo $this->Form->create($EquipmentItems, ['action' => 'equipment-items', 'type' => 'POST']);
    echo $this->Form->control('equipmentFilter', ['placeholder' => 'Enter Equipment Name']);
    echo $this->Form->hidden('filterType', array('value' => 'EF'));
    echo $this->Form->button('Submit');
    echo $this->form->end();
?>


<!-- Filter By Campus -->
<h3>Filter By Campus</h3>
<?php
    echo $this->Form->create($EquipmentItems, ['action' => 'equipment-items', 'type' => 'POST']);
    echo $this->Form->select('campusFilter', $campuslist , array('value' => $campuslist));
    //Determine if its campus filter
    echo $this->Form->hidden('filterType', array('value' => 'CF'));
    echo $this->Form->button('Submit');
    echo $this->Form->end();

?>

<!-- Default stuff -->

<div class="EquipmentItems index content">
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
                <?php foreach ($EquipmentItems as $EquipmentItems): ?>
                    <?php if ($EquipmentItems->equipment_status == '1'): ?>
                        <tr>
                            <td><?= $this->Number->format($EquipmentItems->equipment_id) ?></td>
                            <td><?= h($EquipmentItems->equipment_name) ?></td>
                            <td><?= h($EquipmentItems->equipment_campus) ?></td>
                            <td><?= h($EquipmentItems->equipment_lab) ?></td>
                            <td><?= h($EquipmentItems->equipment_discipline) ?></td>
                            <td><?= h($EquipmentItems->equipment_details) ?></td>
                            <td><?= h($EquipmentItems->equipment_media) ?></td>
                            <td><?= h($EquipmentItems->equipment_whs) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $EquipmentItems->equipment_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $EquipmentItems->equipment_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $EquipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $EquipmentItems->equipment_id)]) ?>
                                <?= $this->Form->postLink(__('Book'), ['action' => 'book', $EquipmentItems->equipment_id]) ?> <!-- Lab Booking Button -->
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
    <?= $this->Form->postLink(__('Book'), ['action' => 'book', $EquipmentItems->equipment_id]) ?>
    <?= $this->Form->end() ?>
</div>
-->
