<div class="networkevents form">
    <h3><?php echo __d('cake', 'Add Network Event'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'NetworkOrganisation',
        array('label' => 'Network Organisation', 'options' => $networkorgs,'empty' => 'Select a Organisation')
        ); 
    echo $this->Form->input('NetworkCost');
    echo $this->Form->input(
        'Networkstatus',
        array('label' => 'Network Status', 'options' => $status,'empty' => 'Select a Status')
        );
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Network Events', array('action' => 'index')); ?></li>
    </ul>
</div>
