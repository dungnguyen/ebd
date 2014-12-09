<div class="advertisements form">
    <h3><?php echo __d('cake', 'Edit Advertisement'); ?></h3>
    <hr>
    <?php
    echo $this->Form->create();
    echo $this->Form->input(
        'AdvertisementType',
        array('label' => 'Advertisement Type', 'options' => $adtypes,'empty' => 'Select a Advertisement Type')
        );
    echo $this->Form->input('DateStart', array(
        'label'=>'Date Start'
        )); 
    echo $this->Form->input('DateEnd', array(
        'label'=>'Date End'
        )); 
    echo $this->Form->input('AdvertisementURL', array(
        'label'=>'Advertisement URL'
        )); 
    echo $this->Form->input('AdvertisementImage', array(
        'label'=>'Advertisement Image'
        )); 
    echo $this->Form->input('AdvertismentText', array(
        'label'=>'Advertisment Text'
        )); 
    echo $this->Form->input(
        'AdvertisementPageType',
        array('label' => 'Advertisement Page', 'options' => $adpageoptions,'empty' => 'Select a Advertisement Page')
        ); 
    echo $this->Form->input(
        'AdvertisementPosition',
        array('label' => 'Advertisement Position', 'options' => $adpositions,'empty' => 'Select a Advertisement Position')
        ); 
    echo $this->Form->input('AdvertisementChecked', array(
        'label'=>'Advertisement Checked'
        )); 
    echo $this->Form->input('AdvertisementCheckBy', array(
        'label'=>'Advertisement Check By'
        )); 
    echo $this->Form->input('AdvertisementUpdatedBy', array(
        'label'=>'Advertisement Updated By'
        )); 
    echo $this->Form->input('AdvertisementUpdateChecked', array(
        'label'=>'Advertisement Update Checked'
        )); 
    echo $this->Form->input('AdvertisementUpdateCheckedBy', array(
        'label'=>'Advertisement Update Checked By'
        )); 
    echo $this->Form->end(__d('cake', 'Submit'));
    ?>
</div>
<div class="actions">
    <h3><?php echo __d('cake', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('cake', 'List') . ' Advertisements', array('action' => 'index')); ?></li>
    </ul>
</div>
