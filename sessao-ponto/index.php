<!DOCTYPE html>
<html lang="pt-BR">

<?php

	include 'head.php';

?>

<body>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115012834-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-115012834-1');
	</script>


	<div class="container-fluid">

		<?php

			include 'menu.php';

			include 'home.php';

			include 'quemsomos.php';

			include 'politicas.php';

			include 'contato.php';

			include 'footer.php';

		?>

    </div>

</body>
</html>