<div class="adverttariff form">
    <h3><?php echo __d('cake', 'Edit Advert Tariff'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'adtype',
        array('label' => 'AdType', 'options' => $adtypes,'empty' => 'Select a AdType')
        );
    echo $this->Form->input(
        'adpage',
        array('label' => 'AdPage', 'options' => $adpageoptions,'empty' => 'Select a AdPage')
        ); 
    echo $this->Form->input(
        'adposition',
        array('label' => 'AdPosition', 'options' => $adpositions,'empty' => 'Select a AdPosition')
        ); 
    echo $this->Form->input('adcost');
    echo $this->Form->input('period');
    echo $this->Form->input('isDeleted', array(
        'type'=>'checkbox'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Advert Tariff', array('action' => 'index')); ?></li>
    </ul>
</div>
