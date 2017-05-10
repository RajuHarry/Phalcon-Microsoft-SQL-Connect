<?php
use Phalcon\Tag as Tag; 
echo $this->getContent();
?>

<h2> Edit User Information </h2>

<?php 
    echo Phalcon\Tag::form('user/update') 
?>
	
	<p>
                <?php                     
                    echo Phalcon\Tag::hiddenField(array("id", "value" => $user->id));
                ?>
                                    
		<label for="name">Name</label>
		<?php                
                    Phalcon\Tag::setDefaults(array("name" => $user->name ));
                    echo Phalcon\Tag::textField("name")                    
                ?>
	</p>

	<p>
		<label for="name">E-Mail</label>                
		<?php 
                    Phalcon\Tag::setDefaults(array("email" => $user->email ));
                    echo Phalcon\Tag::textField("email");                  
                ?>
	</p>

	<p>
		<?php echo Phalcon\Tag::submitButton("Update") ?>
	</p>

</form>

<ul class="pager">
    
	<li class="previous pull-left">
		<?php echo Tag::linkTo('/tutorial', '← Cancel ') ?>
	</li>
        <li class="previous pull-left">
                <?php echo Tag::linkTo('/tutorial/user/delete/?id='.$user->id, 'x Delete ') ?>
	</li>
</ul>