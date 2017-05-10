<?php
use Phalcon\Tag as Tag; 
echo $this->getContent();
if($success){
    echo 'User has been deleted!';
} 

echo Tag::linkTo('/tutorial', '← Back ');