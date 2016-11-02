<h2>Comentarios:</h2>
<?php if( have_comments() ):?>
    
    <h3><?php comments_number(
        'No hay comentarios',
        'Hay un solo comentario',
        'Hay % de comentarios'
    );?></h3>
    
    <ol id="comments-list">
        <?php wp_list_comments(); ?>
    </ol>

	<?php else :?>

		<h3>Tu comentario puede ser el primero, Anímo!!!!</h3>

<?php 
endif; 

    comment_form();