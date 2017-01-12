<div class="workers forma col-md-12 col-xs-12 columns content">
    <?= $this->Form->create($worker, array('type' => 'file')) ?>
    <fieldset>
        <legend><?= __('Add Worker') ?></legend>
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
             echo '<div class="clearfix"></div>';

             ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('bio',  ['class' => 'form-control', 'placeholder' => 'Biography']);
            echo $this->Form->input('address', ['class' => 'form-control', 'placeholder' => 'Address']);

            echo $this->Form->input('birthdate', [
                'type' => 'date',
                'class' => 'form-control',
                'label' => 'Date of birth', 
                'dateFormat' => 'DMY',
                'minYear' => date('Y') - 70,
                'maxYear' => date('Y') - 18 ]);
           
            echo $this->Form->input('gender', ['class' => 'form-control', 'options' => array('1'=> 'Male', '2' => 'Female') ]);
            echo $this->Form->input('upload', ['type' => 'file']);
            echo '<div class="clearfix"></div>';
            ?>
        </div>
    </fieldset>
    <div class="clearfix"></div>
    <hr>
   <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="clearfix"></div>
