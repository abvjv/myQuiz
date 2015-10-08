<?php
if($this->session->userdata('logged_in')):
    echo '<h2> Logut </h2>';
    
    echo form_open('users/logout');
    if($this->session->userdata('username')):
        echo '<p>You are logged in as ' . $this->session->userdata('username') . '</p>';
    endif;
    $data = array(
        'class' => 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Logout'
    );
        
    echo form_submit($data);
    
    echo form_close();

else: 
?>

<h2>Login form</h2>

<?php
//                          login Formular              Bootstrap Klasse horizontal
 $attributes = array('id'=> 'login_form', 'class'=> 'form_horizontal');
 
if($this->session->flashdata('errors')):
    echo $this->session->flashdata('errors');
endif;

    //vordefiniert zum öffnen von form tags
    echo form_open('users/login', $attributes);

    
    // Input Fields
?>
    <div class="form-group">
    
<?php 
    echo form_label('Username'); 
    
    $data = array(
        'class'=> 'form-control',
        'name' => 'username',
        'placeholder' => 'Enter Username',
        );
    
    echo form_input($data);
?>

    </div><div class="form-group">
    
<?php 
    echo form_label('Password'); 
    
    $data = array(
        'class'=> 'form-control',
        'name' => 'password',
        'placeholder' => 'Enter Password',
        );
    
    echo form_password($data);
    
?>
        
            </div><div class="form-group">
    
<?php 
    echo form_label('Confirm Password'); 
    
    $data = array(
        'class'=> 'form-control',
        'name' => 'confirm_password',
        'placeholder' => 'Confirm Password',
        );
    
    echo form_password($data);
    
?>

    </div><div class="form-group">
        
<?php 
    
    $data = array(
        'class'=> 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Login',
        );
    
    echo form_submit($data);
    
    echo form_close();


?>
    </div>

<?php endif; ?>