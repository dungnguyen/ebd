<div class="networkorgs form">
    <h3><?php echo __d('cake', 'Edit Network Org'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input('NetworkOrganisation');
    echo $this->Form->input('Networkorgprofile', array(
        'label'=>'Network Orgprofile'
        )); 
    echo $this->Form->input('Networkcontactname', array(
        'label'=>'Network Contact Name'
        )); 
    echo $this->Form->input('Networkcontacttel', array(
        'label'=>'Network Contact Tel'
        )); 
    echo $this->Form->input('Networkcontactemail', array(
        'label'=>'Network Contact Email'
        )); 
    echo $this->Form->input('Networkcontacturl', array(
        'label'=>'Network Contact Url'
        )); 
    echo $this->Form->input(
        'Networkstatus',
        array('label' => 'Network Status', 'options' => $status,'empty' => 'Select a Status')
        );
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Network Orgs', array('action' => 'index')); ?></li>
    </ul>
</div>
