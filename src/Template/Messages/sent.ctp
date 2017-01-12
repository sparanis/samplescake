<div class="in-page">
    <div class="container">
        <div class="col-md-3">
            <ul class="side-nav">
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('New Messages'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('Inbox'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Sent'), ['controller' => 'Messages', 'action' => 'sent']) ?></li>
                <li><?= $this->Html->link(__('Trash'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
            </ul>
        </div>
        <div class="col-md-9">
            <h3>Sent</h3>
            <ul class="sent">
                <?php $last_date = ''; ?>
                <?php foreach ($messages as $message): ?>
                <?php $date = $message->date;

                if($date != $last_date)
                { 
                    echo '<div class="date-header">'.$date.'</div>';
                }

                 ?>
                    <li class="sent-item">
                        <span class="avatar-span">
                            <div class="avatar-small" style="background-image: url(<?php echo $this->request->webroot.'upload/avatar/'.$message->user['image_url'];?>)">
                                    </div>
                            <?= h($message->to) ?>
                        </span>
                        <span class="overview"> <?= $this->Html->link(__(h($message->content)), ['action' => 'view', $message->id]) ?></span>
                        <span class="date"><?= h($message->time) ?></span>
                        <span class="action"></span>
                    </li>
                <?php 

                if($date!='')
                {
                    $last_date = $date;
                }
                endforeach ?>
                
            </ul>
        </div>
        <div class="clearfix"></div
    </div>
</div>
<br>
<br>
<div class="clearfix"></div>

