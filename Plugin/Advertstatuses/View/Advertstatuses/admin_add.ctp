<div class="advertstatuses form">
    <h3><?php echo __d('cake', 'Add Advert Status'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('AdvertisementStatuses', array(
        'label'=>'Advertisement Status'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Advert Statuses', array('action' => 'index')); ?></li>
    </ul>
</div>
