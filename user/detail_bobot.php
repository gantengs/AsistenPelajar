<div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail perhitungan pembobotan</h2>
                    <ul class="nav navbar-right panel_toolbox  pull-right">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
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
											echo "<td>".$data_tmpl_c_dt['nilai_b']."</td>"; 
									}
							?>
                        </tr>
                        <?php
							}
						?>
						<tr>
							<th>Jumlah</th>
						<?php
							$sql_tmpl_c_dt1 = mysql_query("select sum(spkb.nilai_b) as xx from spkb, spk_c where spk_c.id_user='".$_SESSION["ses_user"]."' and spk_c.id_c=spkb.id_c2 group by spkb.id_c2 order by spkb.id_c2 desc ")
										or die (mysql_error());
								
									while ($data_tmpl_c_dt1 = mysql_fetch_array($sql_tmpl_c_dt1)) {
											echo "<th>".$data_tmpl_c_dt1['xx']."</th>"; 
									}
						?>
						</tr>
						
                      </tbody>
                    </table>
				</div>
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
						  <th>W</th>
						  <th>A</th>
                        </tr>
                      </thead>
                      <tbody>
					    <?php
							$sql_tmpl_c = mysql_query("select*from spk_c where id_user='".$_SESSION["ses_user"]."' order by id_c desc")
							or die (mysql_error());
							$jmlc=mysql_num_rows($sql_tmpl_c);
							$rixx = 0;
							while ($data_tmpl_c = mysql_fetch_array($sql_tmpl_c)) {
						?>
                        <tr>
						  <th><?php echo $data_tmpl_c['nama_c']; ?></th>
                          <?php 
						  $wwww = 0 ;
						  $xw = 0 ;
								$sql_tmpl_c_dt = mysql_query("select*from spkb, spk_c where spkb.id_c1='".$data_tmpl_c["id_c"]."' and spk_c.id_c=spkb.id_c2 order by spkb.id_c2 desc")
									or die (mysql_error());
									
									while ($data_tmpl_c_dt = mysql_fetch_array($sql_tmpl_c_dt)) {
										$sql_tmpl_c_dt12 = mysql_query("select sum(spkb.nilai_b) as xx from spkb, spk_c where spk_c.id_user='".$_SESSION["ses_user"]."' and spk_c.id_c=spkb.id_c2 and spkb.id_c2=".$data_tmpl_c_dt['id_c2']." group by spkb.id_c2 order by spkb.id_c2 desc ")
											or die (mysql_error());
										$data_tmpl_c_dt12 = mysql_fetch_array($sql_tmpl_c_dt12);
										
										$xxx = $data_tmpl_c_dt['nilai_b'] / $data_tmpl_c_dt12['xx']; 
										echo "<td>".$xxx."</td>"; 
										$wwww = $wwww + $xxx;
										$xw = $xw + 1;
									}
									$xwwww = $wwww / $xw;
									echo "<td>".$xwwww."</td>";
										
									$sql_tmpl_c_dt123 = mysql_query("select sum(spkb.nilai_b) as xx from spkb, spk_c where spk_c.id_user='".$_SESSION["ses_user"]."' and spk_c.id_c=spkb.id_c2 and spkb.id_c2=".$data_tmpl_c['id_c']." group by spkb.id_c2 order by spkb.id_c2 desc ")
											or die (mysql_error());
									$data_tmpl_c_dt123 = mysql_fetch_array($sql_tmpl_c_dt123);
										
									$xwwwwa = $xwwww * $data_tmpl_c_dt123['xx'];
									echo "<td>".$xwwwwa."</td>";
									$rixx = $rixx + $xwwwwa;
							?>	
                        </tr>
                        <?php
							}
						?>
                      </tbody>
                    </table>
				</div>
				<Strong>CI : <?php 
					$rixjm = ($rixx - $jmlc) / ($jmlc - 1);
					echo "".$rixjm."";
				?></Strong>
				<?php
				if ($jmlc == 3){
					$rciri = 0.58;
				}else if ($jmlc == 4){
					$rciri = 0.9;
				}else if ($jmlc == 5){
					$rciri = 1.12;
				}else if ($jmlc == 6){
					$rciri = 1.24;
				}else if ($jmlc == 7){
					$rciri = 1.32;
				}else if ($jmlc == 8){
					$rciri = 1.41;
				}else if ($jmlc == 9){
					$rciri = 1.45;
				}else if ($jmlc == 10){
					$rciri = 1.49;
				}else if ($jmlc == 11){
					$rciri = 1.51;
				}else if ($jmlc == 12){
					$rciri = 1.48;
				}else if ($jmlc == 13){
					$rciri = 1.56;
				}else if ($jmlc == 14){
					$rciri = 1.57;
				}else if ($jmlc == 15){
					$rciri = 1.59;
				}else{
					$rciri = 0;
				}
				?>
				<Strong><br>RI : <?php 
					echo "".$rciri."";
				?></Strong>
				<Strong><br>CR : <?php
					$crirx = $rixjm / $rciri;
					echo "".$crirx."";
				?></Strong>
				<Strong><br>Pembobotan : <?php
					if ($rixjm == 0){
						$crirxval = "Konsisten";
					}else if ($crirx <= 0.1){
						$crirxval = "Cukup Konsisten";
					}else{
						$crirxval = "Tidak Konsisten";
					}
					echo "".$crirxval."";
				?></Strong>
                  </div>
                </div>
              </div>