<nav class="col-md-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workers'), ['controller' => 'Workers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Worker'), ['controller' => 'Workers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users forma col-md-9 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username', ['class' => 'col-md-6 half', 'label' => false, 'placeholder' => 'Username']);
            echo $this->Form->input('password', ['class' => 'col-md-6 half', 'label' => false, 'placeholder' => 'Password']);
            echo $this->Form->input('email', ['class' => 'full', 'label' => false, 'placeholder' => 'Email']);
            echo $this->Form->input('type', ['class' => 'col-md-4 half', 'label' => false, 'placeholder' => 'Type'] );
            echo $this->Form->input('status', ['class' => 'col-md-4 half', 'label' => false, 'placeholder' => 'Status']);
        ?>
    </fieldset>
   <div class="cBtn">
        <?= $this->Form->button(__('Submit'), ['class' => 'send']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
