<?php if($utype=='employees'){ ?>

<div class="workers forma col-md-12 col-xs-12 columns content">
    <?= $this->Form->create($worker, array('type' => 'file')) ?>
    <fieldset>
        <legend><?= __('Edit Worker') ?></legend>
        <div class="col-md-6">
            <?php
            
            echo $this->Form->input('user.username', ['class' => 'form-control', 'placeholder' => 'Username']);
            echo $this->Form->input('user.password', ['class' => 'form-control', 'placeholder' => 'Password']);
            echo $this->Form->input('user.email', ['class' => 'form-control', 'placeholder' => 'Email']);
            echo '<hr>';
            echo '<h3>Worker Information</h3>';

            echo $this->Form->input('worker_name',  ['class' => 'form-control', 'placeholder' => 'Worker Name']);
            echo $this->Form->input('phonetic',  ['class' => 'form-control', 'placeholder' => 'Phonetic']);
            echo $this->Form->input('display_name',  ['class' => 'form-control', 'placeholder' => 'Display Name']);
             echo $this->Form->input('birthdate', [
                'type' => 'date',
                'class' => 'form-control',
                'label' => 'Date of birth', 
                'dateFormat' => 'DMY',
                'minYear' => date('Y') - 70,
                'maxYear' => date('Y') - 18 ]);
            

             ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('bio',  ['class' => 'form-control', 'placeholder' => 'Biography']);
            echo $this->Form->input('address', ['class' => 'form-control', 'placeholder' => 'Address']);

            echo $this->Form->input('gender', ['class' => 'form-control', 'options' => array('1'=> 'Male', '2' => 'Female') ]);
            echo '<br><p>Note: If you delete the current profile picture, a default user image will be set.</p>';
            if($worker->user->image_url!='')
            {
             echo '<div class="profile_pic">';
             echo '<img class="avatar" src="'.$this->request->webroot.'upload/avatar/'.$worker->user->image_url.'">';
             echo '<a id="delete_pic" href="javascript:void(0);"><i class="fa fa-times"></i></a></div>';
            }
             echo $this->Form->input('user.image_url', ['class' => 'form-control hidden', 'label' => false]);
             echo $this->Form->input('upload', ['type' => 'file']);
            
            ?>
        </div>
    </fieldset>
    <div class="clearfix"></div>
    <hr>
   <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->end() ?>
</div>
<div class="clearfix"></div>
<?php }else{ ?>
<div class="in-page">
    <div class="container">
        <nav class="col-md-3">
            <ul class="side-nav">
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('My Profile'), ['controller' => 'Workers', 'action' => 'view']) ?></li>
            </ul>
        </nav>
<div class="workers forma col-md-9 columns content">
    <?= $this->Form->create($worker, array('type' => 'file')) ?>
    <fieldset>
        <legend><?= __('Edit Profile') ?></legend>
        <?php
            echo $this->Form->input('worker_name',  ['class' => 'col-md-6 half', 'label' => false, 'placeholder' => 'Worker Name']);
            echo '<div class="clearfix"></div>';
            echo $this->Form->input('phonetic',  ['class' => 'col-md-6 half']);
            echo '<div class="clearfix"></div>';
            echo $this->Form->input('display_name',  ['class' => 'col-md-6 half']);
            echo '<div class="clearfix"></div>';
            echo $this->Form->input('bio',  ['class' => 'full', 'label' => false, 'placeholder' => 'Biography']);
            echo $this->Form->input('address', ['class' => 'full', 'label' => false, 'placeholder' => 'Address']);
              echo $this->Form->input('birthdate', [
            'type' => 'date',
            'class' => 'form-control',
            'label' => 'Date of birth', 
            'dateFormat' => 'DMY',
            'minYear' => date('Y') - 70,
            'maxYear' => date('Y') - 18 ]);
            echo '<div class="clearfix"></div>';
            echo $this->Form->input('gender', ['class' => 'full', 'options' => array('1'=> 'Male', '2' => 'Female') ]);
            echo '<div class="clearfix"></div>';
            echo '<br><p>Note: If you delete the current profile picture, a default user image will be set.</p>';

            

            if($worker->user->image_url!='')
            {
             echo '<div class="profile_pic">';
             echo '<img class="avatar" src="'.$this->request->webroot.'upload/avatar/'.$worker->user->image_url.'">';
             echo '<a id="delete_pic" href="javascript:void(0);"><i class="fa fa-times"></i></a></div>';
            }
             echo $this->Form->input('user.image_url', ['class' => 'form-control hidden', 'label' => false]);
             echo $this->Form->input('upload', ['type' => 'file']);
            
        ?>
    </fieldset>

    <div class="cBtn">
        <?= $this->Form->button(__('Submit'), ['class' => 'send']) ?>
    </div>
    <br>
    <br>
    <?= $this->Form->end() ?>
</div>
<div class="clearfix"></div>
    </div>
</div>


<?php } ?>
