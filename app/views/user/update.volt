<?php
use Phalcon\Tag as Tag; 
echo $this->getContent();
if($success){
    echo 'User has been updated!';
} 

echo Tag::linkTo('/tutorial', '← Back ');