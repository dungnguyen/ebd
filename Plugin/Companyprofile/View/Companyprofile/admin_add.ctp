<div class="companyprofile form">
    <h3><?php echo __d('cake', 'Add Company Profile'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'companyID',
        array('label' => 'Company', 'options' => $companyentries,'empty' => 'Select a Company')
        ); 
    echo $this->Form->input('companyprofile', array(
        'label'=>'Company Profile'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Company Profile', array('action' => 'index')); ?></li>
    </ul>
</div>
