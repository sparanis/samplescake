<div class="in-page">
    <div class="container">
        <div class="col-md-3">
            <ul class="side-nav">
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('New Messages'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('Inbox'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Trash'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
            </ul>
        </div>
        <div class="col-md-9 forma">
           <?= $this->Form->create($message) ?>
            <fieldset>
                <legend><?= __('New Message') ?></legend>
                <?php
                    echo $this->Form->input('To', ['class' => 'full','options' => $users]);
                    echo $this->Form->input('content', ['class' => 'full']);
                    echo '<div class="clearfix"></div>';
                  
                ?>
            </fieldset>
            <hr>
             <div class="cBtn">
                <?= $this->Form->button(__('Send'), ['class' => 'send btn btn-primary']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
        <div class="clearfix"></div
    </div>
</div>
<br>
<br>
<div class="clearfix"></div>

