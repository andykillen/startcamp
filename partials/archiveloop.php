<?php 

the_archive_title('<h1>','</h1>');

while ( have_posts() ) : the_post(); 


endwhile;