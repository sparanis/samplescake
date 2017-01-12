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
            <ul class="thread">
                <?php $last_date = ''; ?>
                <?php foreach ($thread as $message): ?>
                <?php $date = $message->date;

                if($date != $last_date)
                { 
                    echo '<div class="date-header">'.$date.'</div>';
                }

                 ?>
                    <li class="thread-item">
                        <span class="avatar-span">
                            <div class="avatar-small" style="background-image: url(<?php echo $this->request->webroot.'upload/avatar/'.$message->image_url;?>)" data-id="<?= h($message->id) ?>">
                                    </div>
                            <?= h($message->from) ?>
                        </span>
                        <span class="overview"> <?= h($message->content) ?></span>
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
            <div class="reply-box forma">
                <?php echo $this->Form->textarea('content', ['class' => 'reply-area']); ?>
                 <div class="cBtn">
                    <a href="javascript:void(0)" id="reply-btn" class="pull-right send">Send</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<br>
<br>
<div class="clearfix"></div>

