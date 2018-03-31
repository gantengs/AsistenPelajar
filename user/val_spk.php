
<?php		
		$sql3 = mysql_query("SELECT * FROM spk_a WHERE id_user='".$_SESSION["ses_user"]."'") or die (mysql_error());
		$cek3=mysql_num_rows($sql3);
			
		if ($cek3 >=1 ){
		
			$sql_val_spk = mysql_query("select*from spk_a where id_user='".$_SESSION["ses_user"]."' order by id_a desc")
							or die (mysql_error());
							
			while ($data_val_spk = mysql_fetch_array($sql_val_spk)) {
					 
				$sql_delete = "delete from spk where id_a='".$data_val_spk["id_a"]."'";
				$query_delete = mysql_query($sql_delete) or die (mysql_error());

			}
			
			$sql_delete = "delete from spk_a where id_user='".$_SESSION["ses_user"]."'";
			$query_delete = mysql_query($sql_delete) or die (mysql_error());
				
		}
		
		$sql = mysql_query("SELECT * FROM spk_c,spkb WHERE spk_c.id_user='".$_SESSION["ses_user"]."' and spk_c.id_c=spkb.id_c1") or die (mysql_error());
		$cek=mysql_num_rows($sql);
			
		if ($cek >=1 ){
			
			$sql_val_spkb = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
							or die (mysql_error());
							
			while ($data_val_spkb = mysql_fetch_array($sql_val_spkb)) {
					 
				$sql_deleteb = "delete from spkb where id_c1='".$data_val_spkb["id_c"]."'";
				$query_deleteb = mysql_query($sql_deleteb) or die (mysql_error());

			}
			
		}
?>