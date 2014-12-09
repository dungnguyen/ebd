<div class="advertisements index">
    <h2>Advertisements</h2>
    <div class="clearfix filter">
        <?php 
        echo $this->Form->create('Advertisement', array(
            'class' => 'form-inline',
            'inputDefaults' => array(
                'label' => false,
                ),
            ));
        echo $this->Form->input('search', array(
            'label' => false, 
            'tooltip' => false, 
            'placeholder' => __d('croogo', 'Search...'
                )));
        echo $this->Form->input('AdvertisementPageType', array(
            'label' => false, 
            'options' => $adpageoptions,
            'empty' => 'Select a Page'
            )); 
        echo $this->Form->input('AdvertisementPosition', array(
            'label' => false, 
            'options' => $adpositions,
            'empty' => 'Select a Position'
            )); 
        echo $this->Form->input('AdvertisementType', array(
            'label' => false, 
            'options' => $adtypes,
            'empty' => 'Select a Type'
            )); 
        echo $this->Form->submit(__d('croogo', 'Filter'), array(
            'button' => 'default',
            'div' => false,
            ));
        echo $this->Form->end();        
        ?>
    </div>
    <table cellpadding="0" cellspacing="0" class="table table-stripped">
        <tr>
            <th><?php echo $this->Paginator->sort('ID'); ?></th>
            <th><?php echo $this->Paginator->sort('adtype', __d('croogo', 'Advert Type')); ?></th>
            <th><?php echo $this->Paginator->sort('adpage', __d('croogo', 'Advert Page Type')); ?></th>
            <th><?php echo $this->Paginator->sort('adposition', __d('croogo', 'Advert Position')); ?></th>
            <th><?php echo $this->Paginator->sort('DateStart', __d('croogo', 'Date Start')); ?></th>
            <th><?php echo $this->Paginator->sort('DateEnd', __d('croogo', 'Date End')); ?></th>
            <th><?php echo __d('cake', 'Actions'); ?></th>
        </tr>
        <?php foreach ($advertisements as $value): ?>
            <tr>
                <td><?php echo $value['Advertisement']['ID']; ?></td>
                <td><?php echo $value['Adtype']['advariation']; ?></td>
                <td><?php echo $value['Adpageoption']['pagetype']; ?></td>
                <td><?php echo $value['Adposition']['position']; ?></td>
                <td><?php echo $value['Advertisement']['DateStart']; ?></td>
                <td><?php echo $value['Advertisement']['DateEnd']; ?></td>
                <td class="actions">
                    <?php  echo $this->Html->link(
                        __d('cake', 'Edit'),
                        array('action' => 'edit', $value['Advertisement']['ID'])
                        ); ?>

                    <?php echo $this->Form->postLink(
                        __d('cake', 'Delete'),
                        array('action' => 'delete', $value['Advertisement']['ID']),
                        array(),
                        __d(
                            'cake',
                            'Are you sure you want to delete # %s?', $value['Advertisement']['ID']
                            )
                            ); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p>
                <?php
                echo $this->Paginator->counter(
                    array(
                        'format' => __(
                            'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                            )
                        )
                    );
                    ?>
                </p>
                <?php if ($this->Paginator->counter('{:count}') >= 10) { ?>
                    <ul class="pagination">
                        <?php
                        echo $this->Paginator->prev(
                            '<<',
                            array('tag' => 'li', 'escape' => false),
                            '<a ><<</a>',
                            array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false)
                            );
                        echo $this->Paginator->numbers(
                            array(
                                'separator'    => '',
                                'tag'          => 'li',
                                'currentLink'  => true,
                                'currentClass' => 'active',
                                'currentTag'   => 'a'
                                )
                            );
                        echo $this->Paginator->next(
                            '>>',
                            array('tag' => 'li', 'escape' => false),
                            '<a>>></a>',
                            array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false)
                            );
                            ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <div class="actions">
                        <h3><?php echo __d('cake', 'Actions'); ?></h3>
                        <ul>
                            <li><?php echo $this->Html->link(__d('cake', 'New Advertisement'), array('action' => 'add')); ?></li
                            </ul>
                        </div>
