
<?php 
	//footer 
	if (isset($footer_data) )
	{
		if (!empty($footer_data))
		{
			echo '<div id="footer">'.$footer_data.'</div>'; 
		}
	}
?>
</div>

    <footer class="footer">

      <div class="container">
        <p class="pull-right"><?php //<a href="#">Back to top</a> ; ?></p>
        <p>
			<?php echo APP_TITLE_LONG; ?>, &copy; <?php echo APP_AUTHOR; ?> 2013, All rights reserved.
        </p>
      </div>
    </footer>

</body>
</html>