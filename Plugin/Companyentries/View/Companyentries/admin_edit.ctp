<div class="companyentries form">
    <h3><?php echo __d('cake', 'Edit Company Entries'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('companyname', array(
        'label'=>'Company Name'
        )); 
    echo $this->Form->input('street');
    echo $this->Form->input('phone');
    echo $this->Form->input('path');
    echo $this->Form->input('url');
    echo $this->Form->input('fax');
    echo $this->Form->input('email');
    echo $this->Form->input('zip');
    echo $this->Form->input('pathid', array(
        'label'=>'Path ID'
        )); 
    echo $this->Form->input('urlchecked', array(
        'label'=>'URL Checked'
        )); 
    echo $this->Form->input(
        'status',
        array('label' => 'Status', 'options' => $status,'empty' => 'Select a Status')
        );
    echo $this->Form->input('isDeleted', array(
        'type'=>'checkbox'
        ));     
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Company Entries', array('action' => 'index')); ?></li>
    </ul>
</div>
