<div class="companyprofile index">
    <h2>Company Profile</h2>
    <div class="clearfix filter">
        <?php 
        echo $this->Form->create('Companyprofile', array(
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
        echo $this->Form->input('companyID', array(
            'label' => false, 
            'options' => $companyentries,
            'empty' => 'Select a Company'
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
            <th><?php echo $this->Paginator->sort('companyID', __d('croogo', 'Company')); ?></th>
            <th><?php echo $this->Paginator->sort('companyprofile', __d('croogo', 'Profile')); ?></th>
            <th><?php echo $this->Paginator->sort('companydateupdated', __d('croogo', 'Date Updated')); ?></th>
            <th><?php echo $this->Paginator->sort('companyupdatedby', __d('croogo', 'Updated By')); ?></th>
            <th><?php echo __d('cake', 'Actions'); ?></th>
        </tr>
        <?php foreach ($companyprofile as $value): ?>
            <tr>
                <td><?php echo $value['Companyprofile']['ID']; ?></td>
                <td><?php echo $value['Companyentry']['companyname']; ?></td>
                <td><?php echo $value['Companyprofile']['companyprofile']; ?></td>
                <td><?php echo $value['Companyprofile']['companydateupdated']; ?></td>
                <td><?php echo $value['Companyprofile']['companyupdatedby']; ?></td>
                <td class="actions">
                    <?php  echo $this->Html->link(
                        __d('cake', 'Edit'),
                        array('action' => 'edit', $value['Companyprofile']['ID'])
                        ); ?>

                    <?php echo $this->Form->postLink(
                        __d('cake', 'Delete'),
                        array('action' => 'delete', $value['Companyprofile']['ID']),
                        array(),
                        __d(
                            'cake',
                            'Are you sure you want to delete # %s?', $value['Companyprofile']['ID']
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
                            <li><?php echo $this->Html->link(__d('cake', 'New Company Profile'), array('action' => 'add')); ?></li
                            </ul>
                        </div>
