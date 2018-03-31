<?php
					if (isset($_GET['xxxxxxxxxxxxyyyyyyyyyxxccc1'])) {
						if (isset($_GET['xxxxxxxxxxxxyyyyyyyyyxxccc2'])) {
							if (isset($_GET['xxxxxxxxxxxxxxxxxxxxccc1'])) {
								if (isset($_GET['xxxxxxxxxxxxxxxxxxxxccc2'])) {
									if (isset($_GET['xxxxxxxxxxxxxxxxxxxxccc0'])) {
										$xxxx = 1 ;
									}else{
										$xxxx = 2 ;
									}
								}else{
									$xxxx = 2 ;
								}
							}else{
								$xxxx = 2 ;
							}
						}else{
							$xxxx = 2 ;
						}
					}else{
						$xxxx = 2 ;
					}
					
	if (isset($_POST['btnubhbot'])) {
			
				$sql_update_bot = "update spkb set
					nilai_b ='".$_POST['nilai_b']."'
					where id_c1 ='".$_GET["xxxxxxxxxxxxxxxxxxxxccc1"]."' and id_c2 ='".$_GET["xxxxxxxxxxxxxxxxxxxxccc2"]."'";
				$query_update_bot = mysql_query($sql_update_bot) or die (mysql_error());
	
				$xyxy = 1 / $_POST['nilai_b'];
				$sql_update_bot = "update spkb set
					nilai_b ='".$xyxy."'
					where id_c1 ='".$_GET["xxxxxxxxxxxxxxxxxxxxccc2"]."' and id_c2 ='".$_GET["xxxxxxxxxxxxxxxxxxxxccc1"]."'";
				$query_update_bot = mysql_query($sql_update_bot) or die (mysql_error());
	
	}
?>	
				<strong>Data Pembobotan :<br></strong><br>
				<div class="table-responsive">
                   <table class="table table-striped jambo_table" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Kriteria</th>
						  <?php
							$sql_tmpl_c = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
							or die (mysql_error());
						
							while ($data_tmpl_c = mysql_fetch_array($sql_tmpl_c)) {
								echo "<th>".$data_tmpl_c['nama_c']."</th>"; 
						    }
						  ?>
                        </tr>
                      </thead>
                      <tbody>
					    <?php
							$sql_tmpl_c = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
							or die (mysql_error());
						
							while ($data_tmpl_c = mysql_fetch_array($sql_tmpl_c)) {
						?>
                        <tr>
						  <th><?php echo $data_tmpl_c['nama_c']; ?></th>
                          <?php 
								$sql_tmpl_c_dt = mysql_query("select*from spkb, spk_c where spkb.id_c1='".$data_tmpl_c["id_c"]."' and spk_c.id_c=spkb.id_c2 order by spkb.id_c2 desc")
									or die (mysql_error());
								
									while ($data_tmpl_c_dt = mysql_fetch_array($sql_tmpl_c_dt)) {
										if ($data_tmpl_c_dt['id_c1'] == $data_tmpl_c_dt['id_c2']){
											echo "<td><a disabled class='btn btn-default btn-sm' >".$data_tmpl_c_dt['nilai_b']."</a></td>"; 
										}else{
											echo "<td><a class='btn btn-";if ($xxxx == 1){if ($_GET['xxxxxxxxxxxxxxxxxxxxccc1'] == $data_tmpl_c_dt['id_c1'] && $_GET['xxxxxxxxxxxxxxxxxxxxccc2'] == $data_tmpl_c_dt['id_c2']){ echo "success";}else{ echo "info";}}else{ echo "info";} echo " btn-sm' href='?page=Tambah Alternatif&xxxxxxxxxxxxyyyyyyyyyxxccc1=".$data_tmpl_c['nama_c']."&xxxxxxxxxxxxyyyyyyyyyxxccc2=".$data_tmpl_c_dt['nama_c']."&xxxxxxxxxxxxxxxxxxxxccc1=".$data_tmpl_c_dt['id_c1']."&xxxxxxxxxxxxxxxxxxxxccc2=".$data_tmpl_c_dt['id_c2']."&xxxxxxxxxxxxxxxxxxxxccc0=".$data_tmpl_c_dt['nilai_b']."'>".$data_tmpl_c_dt['nilai_b']."</a></td>"; 
										}
									}
							?>
                        </tr>
                        <?php
							}
						?>
                      </tbody>
                    </table>
				</div>
				
				<div class="row">
					<?php
					
					if ($xxxx == 1){	
					?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<form method="post" class="form-horizontal form-label-left" novalidate>
							  <Strong>Perbarui Pembobotan Kriteria :</Strong>
								<div class="item form-group">
								<div class="col-md-12 col-sm-12 col-xs-12">
								<p> <?php echo "".$_GET['xxxxxxxxxxxxyyyyyyyyyxxccc1'].""; ?></p>
									<select class="form-control" id="nilai_b" name="nilai_b">
										<option value="1" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 1){echo "selected";} ?> >Sama penting dengan</option>
										<option value="2" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 2){echo "selected";} ?> >2 Kali lebih penting dari</option>
										<option value="3" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 3){echo "selected";} ?> >3 Kali lebih penting dari</option>
										<option value="4" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 4){echo "selected";} ?> >4 Kali lebih penting dari</option>
										<option value="5" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 5){echo "selected";} ?> >5 Kali lebih penting dari</option>
										<option value="6" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 6){echo "selected";} ?> >6 Kali lebih penting dari</option>
										<option value="7" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 7){echo "selected";} ?> >7 Kali lebih penting dari</option>
										<option value="8" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 8){echo "selected";} ?> >8 Kali lebih penting dari</option>
										<option value="9" <?php if($_GET['xxxxxxxxxxxxxxxxxxxxccc0']== 9){echo "selected";} ?> >9 Kali lebih penting dari</option>
									</select>
								<p> <?php echo "".$_GET['xxxxxxxxxxxxyyyyyyyyyxxccc2'].""; ?></p>
								</div>
							  </div>
							  
							 <div class="form-group">
								<div class="col-md-12">
								  <button id="send" name="btnubhbot" type="submit" class="btn btn-success" onClick="return confirm('Yakin ubah data Pembobotan ?');">Simpan</button>
								</div>
							  </div>
						</form>
					</div>
					<?php
					}else{
						echo "Klik nilai bobot pada Tabel Data Pembobotan untuk mengubah nilai" ;
					}
					?>
					<div class="col-md-6 col-sm-6 col-xs-12">
					<strong>Aturan Pembobotan :</strong><br>
					 <p>1 : Sama Penting.<br>
					 3 : Cukup Penting.<br>
					 5 : Lebih Penting.<br>
					 7 : Sangat Penting.<br>
					 9 : Mutlak Penting.<br>
					 Bilangan genap untuk nilai diantara keterangan diatas.
					 </p>
					 </div>
				</div>
                    <div class="ln_solid"></div>
					