<div class="companiesfeatured form">
    <h3><?php echo __d('cake', 'Add Companies Featured'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'CompanyID',
        array('label' => 'Company', 'options' => $companyentries,'empty' => 'Select a Company')
        ); 
    echo $this->Form->input('FeaturedStartDate');
    echo $this->Form->input('FeaturedEndDate');
    echo $this->Form->input('isDeleted', array(
        'type'=>'checkbox'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Companies Featured', array('action' => 'index')); ?></li>
    </ul>
</div>
