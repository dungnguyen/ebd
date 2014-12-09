<div class="events form">
    <h3><?php echo __d('cake', 'Add Event'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('EventName');
    echo $this->Form->input('EventLocation');
    echo $this->Form->input('EventPostCode');
    echo $this->Form->input('EventDetails');
    echo $this->Form->input('EventCost');
    echo $this->Form->input('EventURL', array(
        'label'=>'Event URL'
        )); 
    echo $this->Form->input(
        'EventStatus',
        array('label' => 'Event Status', 'options' => $status,'empty' => 'Select a Status')
        );
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Events', array('action' => 'index')); ?></li>
    </ul>
</div>
