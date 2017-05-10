<?php
use Phalcon\Tag as Tag; 
echo "<h1>Viewing all users</h1>";
?>

<?php echo $this->getContent() ?>

<p>
	<table class="table">
		<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
		</tr>
	<?php foreach($users as $user){ ?>
		<tr>
                    <td><?php echo $user->id ?></td>			
                    <td><?php echo $user->name ?></td>			
                    <td><?php echo $user->email ?></td>			
                    <!-- user edit link -->
                    <td><?php echo Tag::linkTo('user/edit/?id='.$user->id, 'Edit User') ?></td>
		</tr>
	<?php } ?>
	</table>
        <?php foreach($tweets as $tweet){
          echo $tweet;
        }
        ?>
</p>
<?php
echo Phalcon\Tag::linkTo("signup", "Sign Up Here!");
?>

