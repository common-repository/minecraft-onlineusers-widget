<?php

class widget_mou extends WP_widget
{

	function widget_mou(){
		$options = array(
			"classname" => "widget-mou",
			"description" => "Afficher les joueurs en ligne sur votre serveur Minecraft."
		);

		$this->WP_widget("widget-mou", "Minecraft Online Players", $options);
	}

	function widget($args, $instance)
	{

		$styleCSS = "#mouw {\n}\n\n#mouw li {\n\tfont-size: 15px;\n\tfont-weight: bold;\n}\n\n#mouw li img.avatar {\n\tvertical-align: middle;\n\tmargin-right: 10px;\n}\n\n.widget-title span.title {\n}\n\n.widget-title span.number {\n\tmargin-left: 20px;\n\tfont-weight: bold;\n\tfloat: right;\n}";

		$defaut = array(
			"title" => "Joueurs en ligne",
			"ifNoPlayer" => "Aucun joueur en ligne",
			"serverip" => "ip.mon-serveur.fr",
			"serverport" => "25565",
			"displayAvatar" => "on",
			"displayCount" => "on",
			"nbSlot" => 30,
			"avatarSize" => 25,
			"styleCSS" => $styleCSS
		);
		$instance = wp_parse_args($instance, $defaut);

		$GetPlayers = array();

		if(!empty($instance['serverip']) AND !empty($instance['serverport']))
		{

			$Query = new MinecraftQuery( );

			try
			{
				$Query->Connect( $instance['serverip'], $instance['serverport'], 1 );
				$GetPlayers = (array) $Query->GetPlayers();
			}
			catch( MinecraftQueryException $e )
			{
				// echo $e->getMessage();
			}

			extract($args);

			$displayWidget = '';
			$displayWidget .= '<ul id="mouw">';

			if($GetPlayers !== false)
			{
				foreach ($GetPlayers as $i => $value)
				{
					if($instance['displayAvatar'] !== 1)
					{
						$displayWidget .= '<li><img src="https://minotar.net/helm/' . $value . '/' . $instance['avatarSize'] . '.png" width="' . $instance['avatarSize'] . '" height="' . $instance['avatarSize'] . '" border="0" title="' . $value . '" alt="avatar_' . $value . '" class="avatar" />' . $value . '</li>';
					}
					else
					{
						$displayWidget .= '<li>' . $value . '</li>';
					}
				}
				$resnbPlayer = count($GetPlayers);
			}
			else
			{
				$displayWidget .= '<li>' . $instance['ifNoPlayer'] . '</li>';
				$resnbPlayer = 0;
			}

			$displayWidget .= '</ul>';

			echo '<style>' . $instance['styleCSS'] . '</style>';
			echo $before_widget;

			if($instance['displayCount'] !== 1)
			{
				echo $before_title . '<span class="title">' . $instance['title'] . '</span><span class="number">' . $resnbPlayer . '/' . $instance['nbSlot'] . '</span>' . $after_title;
			}
			else
			{
				echo $before_title . $instance['title'] . $after_title;
			}

			echo $displayWidget;
			echo $after_widget;

		}

	}

	function update($new, $old)
	{
		return $new;
	}

	function form($d)
	{

		$styleCSS = "#mouw {\n}\n\n#mouw li {\n\tfont-size: 15px;\n\tfont-weight: bold;\n}\n\n#mouw li img.avatar {\n\tvertical-align: middle;\n\tmargin-right: 10px;\n}\n\n.widget-title span.title {\n}\n\n.widget-title span.number {\n\tmargin-left: 20px;\n\tfont-weight: bold;\n\tfloat: right;\n}";

		$defaut = array(
			"title" => "Joueurs en ligne",
			"ifNoPlayer" => "Aucun joueur en ligne",
			"serverip" => "ip.mon-serveur.fr",
			"serverport" => "25565",
			"displayAvatar" => "on",
			"displayCount" => "on",
			"nbSlot" => 30,
			"avatarSize" => 25,
			"styleCSS" => $styleCSS
		);
		$d = wp_parse_args($d, $defaut);

		?>
		<?php if(!function_exists('fwrite')){ echo '<p style="border-bottom: 1px dashed #FF0000; color: #FF0000; padding-bottom: 5px;"><b>Attention!</b> La fonction PHP <code>fwrite()</code> n\'est pas disponible sur votre hébergement. Contactez votre administrateur système.</p>'; } ?>
		<p>
		Pour activer le widget, vous devez activer <code>enable-query</code> (<strong>enable-query=true</strong>) dans le fichier <code>server.properties</code> de votre serveur <strong>Minecraft</strong> puis red&eacute;marrer votre serveur.
		</p>
		<hr style="border-top: 1px dashed #CCCCCC;" />
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Titre du widget :</label><br />
		<input value="<?php echo $d['title']; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" type="text" class="widefat" placeholder="Les joueurs en ligne" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('ifNoPlayer'); ?>">Texte de remplacement :</label><br />
		<input value="<?php echo $d['ifNoPlayer']; ?>" name="<?php echo $this->get_field_name('ifNoPlayer'); ?>" id="<?php echo $this->get_field_id('ifNoPlayer'); ?>" type="text" class="widefat" placeholder="Aucun joueur en ligne" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('serverip'); ?>">Adresse IP du serveur :</label><br />
		<input value="<?php echo $d['serverip']; ?>" name="<?php echo $this->get_field_name('serverip'); ?>" id="<?php echo $this->get_field_id('serverip'); ?>" type="text" class="widefat" placeholder="play.minefight.fr" /><br />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('serverport'); ?>">Port du serveur :</label><br />
		<input value="<?php echo $d['serverport']; ?>" name="<?php echo $this->get_field_name('serverport'); ?>" id="<?php echo $this->get_field_id('serverport'); ?>" type="text" class="widefat" placeholder="25565" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('nbSlot'); ?>">Nombre de slot du serveur (<abbr title="Nombre de slot disponible sur votre serveur">?</abbr>) :</label><br />
		<input value="<?php echo $d['nbSlot']; ?>" name="<?php echo $this->get_field_name('nbSlot'); ?>" id="<?php echo $this->get_field_id('nbSlot'); ?>" type="text" class="widefat" placeholder="30" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('avatarSize'); ?>">Taille des avatars (<abbr title="Nombre de pixel (Longueur x Hauteur) de l'image">?</abbr>) :</label><br />
		<input value="<?php echo $d['avatarSize']; ?>" name="<?php echo $this->get_field_name('avatarSize'); ?>" id="<?php echo $this->get_field_id('avatarSize'); ?>" type="text" class="widefat" placeholder="25" />
		</p>
		<p id="editCSS">
		<label for="<?php echo $this->get_field_id('styleCSS'); ?>">Modifier le style CSS (<a href="https://pastebin.com/u7H7G31e" target="_blank">CSS par défaut</a>) :</label><br />
		<textarea name="<?php echo $this->get_field_name('styleCSS'); ?>" id="<?php echo $this->get_field_id('styleCSS'); ?>" class="widefat" rows="10" style="resize: vertical;"><?php echo $d['styleCSS']; ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('displayAvatar'); ?>"><input name="<?php echo $this->get_field_name('displayAvatar'); ?>" id="<?php echo $this->get_field_id('displayAvatar'); ?>" type="checkbox" <?php if($d['displayAvatar'] == 'on'){ echo 'checked'; } ?> /> Afficher l'avatar des joueurs</label><br />
		<label for="<?php echo $this->get_field_id('displayCount'); ?>"><input name="<?php echo $this->get_field_name('displayCount'); ?>" id="<?php echo $this->get_field_id('displayCount'); ?>" type="checkbox" <?php if($d['displayCount'] == 'on'){ echo 'checked'; } ?> /> Afficher le nombre de joueur en ligne</label>
		</p>
		<hr style="border-top: 1px dashed #CCCCCC;" />
		<p align="center">
			<a href="https://twitter.com/pirmax" target="_blank" title="Twitter" style="text-decoration: none;"><span class="dashicons dashicons-twitter"></span></a>
			<a href="https://www.yubigeek.com/?ref=mouw" target="_blank" title="Blog" style="text-decoration: none;"><span class="dashicons dashicons-wordpress"></span></a>
			<br><br>
			<a href="https://www.paypal.me/pirmax/5" target="_blank"><img src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donate_SM.gif"></a>
		</p>
		<hr style="border-top: 1px dashed #CCCCCC;" />
		<?php

	}

}

?>
