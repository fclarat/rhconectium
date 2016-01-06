<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package RH Conectium
 */
?>

	</div><!-- #content -->

	<!-- Footer -->

        <footer>
            <div class="shadow_long"></div>
            <div class="wrapper">
                <aside class="content_redes_footer">
                    <a href="#" class="icon_face" target="_blank"></a>
                    <a href="#" class="icon_linkedin" target="_blank"></a>
                    <div class="clearfix"></div>
                </aside>
                <nav class="nav_footer">
                    <ul>
                        <li><a href="<?php echo get_permalink(261); ?>">¿QUE ES RH CONECTIUM?</a></li>
                        <li><a href="<?php echo get_permalink(263); ?>">PREGUNTAS FRECUENTES</a></li>
                        <li><a href="<?php echo get_permalink(258); ?>">TERMINOS Y CONDICIONES</a></li>
                        <li><a href="<?php echo get_permalink(270); ?>">POLITICAS DE PRIVACIDAD</a></li>
                        <li><a href="<?php echo get_permalink(265); ?>">CONTACTO</a></li>
                    </ul>
                </nav>
                <p class="copy">Copyright 2014 - <a href="http://www.analiagraphicdesign.com/" target="_blank">Analía Pirlone | Design Studio</a></p>
            </div>
        </footer>
</div><!-- #page -->

<!-- Scripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo("template_url"); ?>/js/vendor/jquery-1.11.0.js"><\/script>')</script>

<?php wp_footer(); ?>

</body>
</html>
