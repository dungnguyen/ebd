<div class="adtrackers form">
    <h3><?php echo __d('cake', 'Edit Adtracker'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'AdvertID',
        array('label' => 'Advert', 'options' => $advertisements,'empty' => 'Select a Advert')
        ); 
    echo $this->Form->input('IPaddresschecked', array(
        'label'=>'IP Address Checked'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Adtrackers', array('action' => 'index')); ?></li>
    </ul>
</div>
