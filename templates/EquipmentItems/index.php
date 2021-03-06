<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipmentItems[]|\Cake\Collection\CollectionInterface $equipmentItems
 */
 use Cake\Core\Configure;
 $this->Html->scriptStart(['block' => true]);
 echo "var modal = document.getElementById('modalDiv');

 var show = document.getElementsByClassName('modal-link');

 var span = document.getElementsByClassName('close')[0];

for (var i=0; i < show.length; i++) {
  show[i].onclick = function() {
    modal.style.display = 'block';
    return i;
  }
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
    echo $this->Form->control('equipmentFilter', ['placeholder' => 'Keyword Search', 'label' =>'']);
?>


<!-- Filter By Campus -->
<h3>Filter by Campus</h3>
<?php
    echo $this->Form->select('campusFilter', $campuslist , array('value' => $campuslist));
    echo $this->Form->button('Filter', array('id'=> 'button'));
    echo $this->Form->end();

?>

<!-- Default stuff -->

<div class="EquipmentItems index content">
  <?php
      Configure::restore('signed_in', 'default');
      Configure::restore('is_staff', 'default');
      $is_staff = Configure::read('is_staff');
      if ($is_staff == true) {
        echo $this->Html->link(__('New Equipment'), ['action' => 'add'], ['class' => 'button']);
      } 
  ?>
  <!--<h3><?= __('Equipment Items') ?></h3>-->


    <div class="table-responsive">
        <table>
            <!--<thead>-->
                <tr class = "tr1">
                    <th><?= $this->Paginator->sort('equipment_name', 'Equipment') ?></th>
                    <th><?= $this->Paginator->sort('equipment_campus', 'Campus') ?></th>
                    <th><?= $this->Paginator->sort('equipment_lab', 'Lab') ?></th>
                    <th><?= $this->Paginator->sort('equipment_details', 'Details') ?></th>
                    <th><?= $this->Paginator->sort('equipment_location', 'Location') ?></th>
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
                            <td><?= h($equipmentItems->equipment_location) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $equipmentItems->equipment_id]) ?>
                                <?php
                                    if ($equipmentItems->equipment_whs == '') {
                                      echo $this->form->postLink(__('Book'),  ['action' => 'book', $equipmentItems->equipment_id]);
                                    }
                                    else {
                                      echo $this->Form->postLink(__('Book'), ['action' => 'book', $equipmentItems->equipment_id], ['confirm' => __("Have you completed the required induction for {0}?\n{1}", $equipmentItems->equipment_name, $equipmentItems->equipment_whs)]);
                                    }
                                    if ($is_staff == true) {
                                      echo $this->Html->link(__('Edit'), ['action' => 'edit', $equipmentItems->equipment_id]);
                                      echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentItems->equipment_id], ['confirm' => __('Are you sure you want to delete {0}?', $equipmentItems->equipment_name)]);
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
