<div class="adpageoptions form">
    <h3><?php echo __d('cake', 'Add adpageoptions'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('pagetype', array(
        'label'=>'Page Type'
        )); 
    echo $this->Form->input('isDeleted', array(
        'type'=>'checkbox'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Adpageoptions', array('action' => 'index')); ?></li>
    </ul>
</div>
