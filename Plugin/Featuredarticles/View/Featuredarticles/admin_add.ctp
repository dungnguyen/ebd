<div class="featuredarticles form">
    <h3><?php echo __d('cake', 'Add Featured Article'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'CompanyID',
        array('label' => 'Company', 'options' => $companyentries,'empty' => 'Select a Company')
        ); 
    echo $this->Form->input('ArticleTitle');
    echo $this->Form->input('ArticlePerson');
    echo $this->Form->input('ArticleInterviewer');
    echo $this->Form->input('ArticleDetails');
    echo $this->Form->input(
        'ArticleStatus',
        array('label' => 'Article Status', 'options' => $status,'empty' => 'Select a Status')
        );
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Featured Articles', array('action' => 'index')); ?></li>
    </ul>
</div>
