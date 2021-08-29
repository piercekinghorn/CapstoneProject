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


<!-- Filter By Name -->
<h3>Search for Equipment</h3>
<?php
    echo $this->Form->create($equipmentItems, ['action' => 'equipment-items', 'type' => 'POST']);
    echo $this->Form->control('equipmentFilter', ['placeholder' => 'Equipment keyword', 'label' =>'']);
    echo $this->Form->hidden('filterType', array('value' => 'EF'));
    echo $this->Form->button('Search', array('id'=> 'button'));
    echo $this->form->end();
?>


<!-- Filter By Campus -->
<h3>Select Campus</h3>
<?php
    echo $this->Form->create($equipmentItems, ['action' => 'equipment-items', 'type' => 'POST']);
    echo $this->Form->select('campusFilter', $campuslist , array('value' => $campuslist));
    //Determine if its campus filter
    echo $this->Form->hidden('filterType', array('value' => 'CF'));
    echo $this->Form->button('Filter', array('id'=> 'button'));
    echo $this->Form->end();

?>

<!-- Default stuff -->

<div class="EquipmentItems index content">
    <?= $this->Html->link(__('New Equipment'), ['action' => 'add'], ['class' => 'button']) ?>
    <!--<h3><?= __('Equipment Items') ?></h3>-->


    <div class="table-responsive">
        <table>
            <!--<thead>-->
                <tr class = "tr1">
                    <th><?= $this->Paginator->sort('equipment_name', 'Equipment') ?></th>
                    <th><?= $this->Paginator->sort('equipment_campus', 'Campus') ?></th>
                    <th><?= $this->Paginator->sort('equipment_lab', 'Lab') ?></th>
                    <th><?= $this->Paginator->sort('equipment_details', 'Details') ?></th>
                    <th class="actions"><?= __('Options') ?></th>
                </tr>
            <!--</thead>-->
            <tbody>
                <?php foreach ($equipmentItems as $equipmentItems): ?>
                    <?php if ($equipmentItems->equipment_status == '1'): ?>
                        <tr class = "tr2">
                            <td class = "td1"><?= $this->Html->link(__(h($equipmentItems->equipment_name)), ['action' => 'view', $equipmentItems->equipment_id]) ?></td> <!-- Turns all items to links to 'View' -->
                            <td><?= h($equipmentItems->equipment_campus) ?></td>
                            <td><?= h($equipmentItems->equipment_lab) ?></td>
                            <td><?= h($equipmentItems->equipment_details) ?></td>       
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $equipmentItems->equipment_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipmentItems->equipment_id]) ?>                        
                                <?= $this->Form->postLink(__('Book'), ['action' => 'book', $equipmentItems->equipment_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentItems->equipment_id)]) ?>
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
    <?= $this->Form->create($labBookings) ?>
    <?php
        echo $this->Form->text('booking_date', ['class' => 'datepicker', 'placeholder' => 'Booking Date']);
        echo $this->Form->text('date_return', ['class' => 'datepicker', 'placeholder' => 'Return Date']);
    ?>
    <?= $this->Form->postLink(__('Book'), ['action' => 'book', $equipmentItems->equipment_id]) ?>
    <?= $this->Form->end() ?>