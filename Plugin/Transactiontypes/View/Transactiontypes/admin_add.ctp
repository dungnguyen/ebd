<div class="transactiontypes form">
    <h3><?php echo __d('cake', 'Add Transaction Type'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('TransactionTypeName');
    echo $this->Form->input('TransactionTypeCost');
    echo $this->Form->input(
        'TransactionStatus',
        array('label' => 'Transaction Status', 'options' => $status,'empty' => 'Select a Status')
        ); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Transactions Types', array('action' => 'index')); ?></li>
    </ul>
</div>
