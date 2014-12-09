<div class="featuredarticles index">
    <h2>Featured Articles</h2>
    <div class="clearfix filter">
        <?php 
        echo $this->Form->create('Featuredarticle', array(
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
        echo $this->Form->input('CompanyID', array(
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
            <th><?php echo $this->Paginator->sort('CompanyID', __d('croogo', 'Company')); ?></th>
            <th><?php echo $this->Paginator->sort('ArticleTitle', __d('croogo', 'Title')); ?></th>
            <th><?php echo $this->Paginator->sort('ArticlePerson', __d('croogo', 'Person')); ?></th>
            <th><?php echo $this->Paginator->sort('ArticleInterviewer', __d('croogo', 'Viewer')); ?></th>
            <th><?php echo $this->Paginator->sort('ArticleStatus', __d('croogo', 'Status')); ?></th>
            <th><?php echo $this->Paginator->sort('ArticleSubmittedDate', __d('croogo', 'Submitted Date')); ?></th>
            <th><?php echo __d('cake', 'Actions'); ?></th>
        </tr>
        <?php foreach ($featuredarticles as $value): ?>
            <tr>
                <td><?php echo $value['Featuredarticle']['ID']; ?></td>
                <td><?php echo $value['Companyentry']['companyname']; ?></td>
                <td><?php echo $value['Featuredarticle']['ArticleTitle']; ?></td>
                <td><?php echo $value['Featuredarticle']['ArticlePerson']; ?></td>
                <td><?php echo $value['Featuredarticle']['ArticleInterviewer']; ?></td>
                <td>
                    <?php if ($value['Featuredarticle']['ArticleStatus'] == 1): ?>
                        <span class="label label-warning"><?php echo __d('croogo', 'Unpublished'); ?></span>
                    <?php endif ?>

                    <?php if ($value['Featuredarticle']['ArticleStatus'] == 2): ?>
                        <span class="label label-info"><?php echo __d('croogo', 'Published'); ?></span>
                    <?php endif ?>  

                    <?php if ($value['Featuredarticle']['ArticleStatus'] == 3): ?>
                        <span class="label label-success"><?php echo __d('croogo', 'Preview'); ?></span>
                    <?php endif ?>
                </td>
                <td><?php echo $value['Featuredarticle']['ArticleSubmittedDate']; ?></td>
                <td class="actions">
                    <?php  echo $this->Html->link(
                        __d('cake', 'Edit'),
                        array('action' => 'edit', $value['Featuredarticle']['ID'])
                        ); ?>

                    <?php echo $this->Form->postLink(
                        __d('cake', 'Delete'),
                        array('action' => 'delete', $value['Featuredarticle']['ID']),
                        array(),
                        __d(
                            'cake',
                            'Are you sure you want to delete # %s?', $value['Featuredarticle']['ID']
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
                            <li><?php echo $this->Html->link(__d('cake', 'New Featured Article'), array('action' => 'add')); ?></li
                            </ul>
                        </div>
