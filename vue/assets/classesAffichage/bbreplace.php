<?php
class bbreplace
{
	public static function replace($texte)
	{
	//Smileys
	$texte = str_replace(':D', '<img src="vue/assets/img/smileys/joie.gif"  />', $texte);
	$texte = str_replace(':)', '<img src="vue/assets/img/smileys/content.gif" />', $texte);
	$texte = str_replace(';)', '<img src="vue/assets/img/smileys/complice.gif" />', $texte);
	//gras
	$texte = preg_replace('`\[g\](.+)\[/g\]`isU', '<strong>$1</strong>', $texte);
	//italique
	$texte = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $texte);
	//souligné
	$texte = preg_replace('`\[s\](.+)\[/s\]`isU', '<u>$1</u>', $texte);
	//lien
	$texte = preg_replace('#https?://[a-z0-9._/-]+#', '<a href="$0">$0</a>', $texte);

	return $texte;
	}




}
