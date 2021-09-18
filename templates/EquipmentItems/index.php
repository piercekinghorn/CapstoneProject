<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems[]|\Cake\Collection\CollectionInterface $equipmentItems
 */

$this->Html->scriptStart(['block' => true]);
echo "
var modal = document.getElementById('myModal');

var btn = document.getElementById('myBtn');

var span = document.getElementsByClassName('close')[0];

btn.onclick = function() {
  modal.style.display = 'block';
}

span.onclick = function() {
  modal.style.display = 'none';
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}";
$this->Html->scriptEnd()
?>


<!-- Filter By Name -->
<h3>Search for Equipment</h3>
<?php
    echo $this->Form->create($equipmentItems, ['action' => '', 'type' => 'POST']);
    echo $this->Form->control('equipmentFilter', ['placeholder' => 'Equipment keyword', 'label' =>'']);
?>


<!-- Filter By Campus -->
<h3>Select Campus</h3>
<?php
    echo $this->Form->select('campusFilter', $campuslist , array('value' => $campuslist));
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
                                <?= $this->Form->postLink(__('Book'), ['action' => 'book', $equipmentItems->equipment_id])?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentItems->equipment_id)])?>
                            </td>  
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!--
    <div>
        <?php
            //echo $this->Form->create($labBookings, ['action' => 'lab-bookings', 'type' => 'POST']);
            //echo $this->Form->hidden('equipment_id', ['value' => '']);
            //echo $this->Form->control('staff_id', ['label' => 'Staff ID', 'placeholder' => 'Staff ID','type' => 'text']);
            //echo $this->Form->control('booking_date', ['label' =>'Booking Date', 'type' => 'date']);
            //echo $this->Form->control('return_date', ['label' =>'Return Date', 'type' => 'date']);
            //echo $this->Form->button('Book', array('id'=> 'button'));
            //echo $this->Form->end();
        ?>
    </div>
    -->
</div>
