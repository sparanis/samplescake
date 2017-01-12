<?php if($utype == 'employees'){ ?>

<?= $this->Html->link(__('New Worker'), ['controller'=> 'Workers', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
<hr>
<h3><?= __('Workers') ?></h3>
<div class="workers index large-9 medium-8 columns content">
    
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('worker_name') ?></th>
                <th><?= $this->Paginator->sort('phonetic') ?></th>
                <th><?= $this->Paginator->sort('display_name') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('gender') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workers as $worker): ?>
            <tr>
                <td><?= $this->Number->format($worker->id) ?></td>
                <td><?= h($worker->user->username) ?></td>
                <td><?= h($worker->worker_name) ?></td>
                <td><?= h($worker->phonetic) ?></td>
                <td><?= h($worker->display_name) ?></td>
                <td><?= h($worker->address) ?></td>
                <td><?php echo ($worker->gender == 1 ? 'Male' : 'Female') ?></td>
                <td><?= h($worker->created) ?></td>
                <td><?= h($worker->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $worker->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $worker->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $worker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $worker->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

<?php }else{ ?>

 <!--about start-->
<?php foreach ($workers as $worker): ?>
    <div id="about">
        <div class="line2">
            <div class="container">
                <div class="row Fresh">
                    <div class="col-md-6 Des">
                        <h2>Welcome <?= h($worker->worker_name) ?>!</h2>
                        <!-- worker image goes here -->
                        <div class="team">
                            <div class="avatar" style="background-image: url(<?php echo $this->request->webroot.'upload/avatar/'.$worker->user->image_url; ?>)">

                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-6 Fully">
                        <nav class="col-md-7 columns" id="actions-sidebar">
                            <ul class="side-nav">
                                <li class="heading"><?= __('Actions') ?></li>
                                <li><?= $this->Html->link(__('View Profile'), ['controller' => 'Workers', 'action' => 'view/1']) ?></li>
                                <li><?= $this->Html->link(__('Edit Profile'), ['controller' => 'Workers', 'action' => 'edit/1']) ?></li>
                                <li><?= $this->Html->link(__('Search Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('List Projects'), ['controller' => 'WorkersProjects', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Cover Letter'), ['controller' => 'CoverLetters', 'action' => 'add']) ?></li>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-applications">
        <div class="container">
            <h3>My Applications</h3>
        </div>
        <div class="application-list-holder">
             <div class="container">
                <?php foreach ($all_jobs_applied as $job_list): ?>
                    <div class="application-item hvr-grow">
                         <h5><a href="<?php echo $this->request->webroot; ?>job-applications/view/<?php echo $job_list->id; ?>"><?php echo $job_list->job->job_title; ?></a></h5>
                         <hr>
                         <p><?= $this->Text->truncate(h($job_list->cover_letter)); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div id="news">
        <div class="line4">
            <div class="container">
                <div class="row Ama">
                    <div class="col-md-12">
                    <h3>What&rsquo;s New?</h3>
                    <p>Get the latest job posts from our job bank</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container home-all-jobs">
                <?php foreach ($all_jobs as $job): ?>
                <div class="col-md-4">
                    <div class="job-holder">
                        <div class="job-head"><a href="<?php echo $this->request->webroot;?>jobs/view/<?php echo $job->id; ?>">#<?= $this->Number->format($job->id) ?> : <?= h($job->job_title) ?></a></div>
                        <div class="job-type">
                            <span><?= $job->has('job_category') ? $this->Html->link($job->job_category->name, ['controller' => 'JobCategories', 'action' => 'view', $job->job_category->id]) : '' ?></span>
                            <span><?= $job->has('job_function') ? $this->Html->link($job->job_function->name, ['controller' => 'JobFunctions', 'action' => 'view', $job->job_function->id]) : '' ?></span>
                            <span><?= $job->has('location') ? $this->Html->link($job->location->name, ['controller' => 'Locations', 'action' => 'view', $job->location->id]) : '' ?></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="job-content">
                            <p><span class="j-label">English Proficiency:</span><?= ($job->english_proficiency != '' ? h($job->english_proficiency) : 'All English proficiency') ?></p>
                            <p><span class="j-label">Japanese Proficiency:</span><?= ($job->japanese_proficiency != '' ? h($job->japanese_proficiency) : 'All Japanese proficiency') ?></p>
                            <p><?= h($job->contract_type) ?> / <?= h($job->career_level) ?></p>
                            <p><?= h($job->employer_type) ?></p>
                            <p><span class="j-label">Posted on:</span><?= h($job->created) ?></p>
                            <p><span class="j-label">Last updated on:</span><?= h($job->modified) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        <div class="clearfix"></div>
        </div>
    </div>

 <?php endforeach; ?>

 <?php } ?>


