<div class="transactions form">
    <h3><?php echo __d('cake', 'Add Transaction'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'TransactionType',
        array('label' => 'Transaction Type', 'options' => $transactiontypes,'empty' => 'Select a Type')
        ); 
    echo $this->Form->input('TransactionFee');
    echo $this->Form->input('TransactionReferenceCode');
    echo $this->Form->input(
        'TransactionStatus',
        array('label' => 'Transaction Status', 'options' => $status,'empty' => 'Select a Status')
        );
    echo $this->Form->input('TransactionIPaddress', array(
        'label'=>'Transaction IP Address'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Transactions', array('action' => 'index')); ?></li>
    </ul>
</div>
