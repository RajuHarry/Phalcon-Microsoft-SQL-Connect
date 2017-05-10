<?php
use Phalcon\Tag as Tag; 
echo $this->getContent();
if($success){    
    echo 'Thanks for registering!';
} 

echo Tag::linkTo('/tutorial', '← Back ');

