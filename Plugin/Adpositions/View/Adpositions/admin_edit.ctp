<div class="adpositions form">
    <h3><?php echo __d('cake', 'Edit Adpositions'); ?></h3>
    <hr>
    <?php
        echo $this->Form->create();
        echo $this->Form->input('position');
        echo $this->Form->input('isDeleted', array(
        'type'=>'checkbox'
        )); 

        echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Adpositions', array('action' => 'index')); ?></li>
    </ul>
</div>
