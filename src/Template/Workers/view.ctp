<?php if($utype=='customers'){ $col = 'col-md-12'; ?>
<div class="in-page">
    <div class="container">

<?php }else if($utype!='employees'){ $col = 'col-md-9'; ?>

<div class="in-page">
    <div class="container">

<nav class="col-md-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Histories'), ['controller' => 'Histories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New History'), ['controller' => 'Histories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New License'), ['controller' => 'Licenses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?> </li>
    </ul>
</nav>

<?php } ?>

<div class="workers view resume <?php echo $col; ?> columns content">
    <h3>Basic Information</h3>
    <table class="skill-sheet">
        <tr>
            <td class="td-label">Created</td>
            <td><?= h($worker->created) ?></td>
            <td class="td-label">Display Name</td>
            <td><?= h($worker->display_name) ?></td>
            <td class="resume-img" rowspan="3"><img src="<?php echo $this->request->webroot.'upload/avatar/'.$worker->user->image_url; ?>"></td>

        </tr>
        <tr>
            <td class="td-label">Address</td>
            <td><?= h($worker->address) ?></td>
            <td class="td-label">Gender</td>
            <td><?php echo ($worker->gender == 1 ? 'Male' : 'Female') ?></td>
        </tr>
        <tr>
            <td class="td-label">Bio</td>
            <td colspan="3" class="bio">
                <?= $this->Text->autoParagraph(h($worker->bio)); ?>
            </td>
        </tr>
    </table>
    <?php if (!empty($worker->skills)): ?>
    <h3>Skills</h3>
     <?php if($utype=='workers'||($utype=='employees' && $myetype==1)){ ?>
    <?= $this->Html->link(__('Change Skills'), ['controller' => 'Skills', 'action' => 'index', $worker->id],['class' => 'btn btn-primary']) ?>
    <?php } ?>
    <?php echo $skillview; ?>
    <?php endif; ?>

   <!--  <div class="related">
        <h4><?= __('Related Bookmarks') ?></h4>
        <?php if (!empty($worker->bookmarks)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Worker Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($worker->bookmarks as $bookmarks): ?>
            <tr>
                <td><?= h($bookmarks->id) ?></td>
                <td><?= h($bookmarks->customer_id) ?></td>
                <td><?= h($bookmarks->worker_id) ?></td>
                <td><?= h($bookmarks->created) ?></td>
                <td><?= h($bookmarks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bookmarks', 'action' => 'view', $bookmarks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bookmarks', 'action' => 'edit', $bookmarks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookmarks', 'action' => 'delete', $bookmarks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmarks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
   
    <div class="related">
        <?php if (!empty($worker->histories)): ?>
        <h3><?= __('Histories') ?></h3>
        <?php if($utype=='workers'||($utype=='employees' && $myetype==1)){ ?>
        <?= $this->Html->link(__('Change Histories'), ['controller' => 'Histories', 'action' => 'index', $worker->id],['class' => 'btn btn-primary']) ?>
        <?php } ?>
        <table class="skill-sheet columnar" cellpadding="0" cellspacing="0">
            <tr>
                
                <th><?= __('History Date') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Skillset') ?></th>
                <th><?= __('Scope') ?></th>
               <!--  <th class="actions"><?= __('Actions') ?></th> -->
            </tr>
            <?php foreach ($worker->histories as $histories): ?>
            <tr>
               
                <td><?= h($histories->history_from) ?><br><?= h($histories->history_to) ?></td>
                <td><?= h($histories->description) ?></td>
                <td><?= h($histories->skillset) ?></td>
                <td><?= h($histories->scope) ?></td>
        
                <!-- <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Histories', 'action' => 'view', $histories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Histories', 'action' => 'edit', $histories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Histories', 'action' => 'delete', $histories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $histories->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($worker->licenses)): ?>
         <h3><?= __('Licenses') ?></h3>
         <?php if($utype=='workers'||($utype=='employees' && $myetype==1)){ ?>
         <?= $this->Html->link(__('Change Licenses'), ['controller' => 'Licenses', 'action' => 'index', $worker->id],['class' => 'btn btn-primary']) ?>
         <?php } ?>
        <table class="skill-sheet columnar" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Received') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
               <!--  <th class="actions"><?= __('Actions') ?></th> -->
            </tr>
            <?php foreach ($worker->licenses as $licenses): ?>
            <tr>
                
                <td><?= h($licenses->name) ?></td>
                <td><?= h($licenses->received) ?></td>
                <td><?= h($licenses->created) ?></td>
                <td><?= h($licenses->modified) ?></td>
               <!--  <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Licenses', 'action' => 'edit', $licenses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Licenses', 'action' => 'delete', $licenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $licenses->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
   
    <?php if (!empty($worker->workers_projects)): ?>
    <h3>Project Experience</h3>
     <?php if($utype=='workers'||($utype=='employees' && $myetype==1)){ ?>
     <?= $this->Html->link(__('Change Projects'), ['controller' => 'WorkersProjects', 'action' => 'index', $worker->id],['class' => 'btn btn-primary']) ?>
    <?php } ?>
    <?php echo $projectview; ?>
    <?php endif; ?>
    <!-- <div class="related">
        <h4><?= __('Skills') ?></h4>
        <?php if (!empty($worker->skills)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Level') ?></th>
                <th><?= __('Remarks') ?></th>
                <th><?= __('Skill Option Id') ?></th>
                <th><?= __('Worker Id') ?></th>
                <th><?= __('Skill Level Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($worker->skills as $skills): ?>
            <tr>
                <td><?= h($skills->id) ?></td>
                <td><?= h($skills->level) ?></td>
                <td><?= h($skills->remarks) ?></td>
                <td><?= h($skills->skill_option_id) ?></td>
                <td><?= h($skills->worker_id) ?></td>
                <td><?= h($skills->skill_level_id) ?></td>
                <td><?= h($skills->created) ?></td>
                <td><?= h($skills->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skills->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skills->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skills', 'action' => 'delete', $skills->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skills->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
</div>

<?php if(!$utype=='employees'){ ?>
</div>
</div>
<?php } ?>
<div class="clearfix"></div>


