<!DOCTYPE html>
<html lang="id">
<head>
	<title>Error</title>
</head>
<body>
		     <?php
				$sqlrincian = mysql_query("select*from jenjang natural join instansi natural join kelas where id_user='".$_SESSION["ses_user"]."' and hps_ins='no' and hps_kls='no' order by tgl_kls desc")
				or die (mysql_error());
			    while ($data_rinci_tmpl = mysql_fetch_array($sqlrincian)) {
			 ?>    
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    	<div class="col-md-5">
							<a href="?page=hdvtjbvhfnyg&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&hdvtjbvhfnyg=<?php echo $data_rinci_tmpl['id_kls'];?>" title="Klik untuk Navigasi Data pada kelas ini...">
							<h2><?php echo $data_rinci_tmpl['singkat_jnjg']." ".$data_rinci_tmpl['nama_ins']; ?><br>
							<?php echo "(".$data_rinci_tmpl['nama_kls']." ".$data_rinci_tmpl['smtr_kls'].")"; ?></h2>
							</a>
							<?php
								$sqltgl_kls_format = mysql_query("select DATE_FORMAT('".$data_rinci_tmpl['tgl_kls']."', '%d %b %Y') as tgl")
								or die (mysql_error());
								$data_tgl_kls_format=mysql_fetch_array($sqltgl_kls_format);
							?>
							<a href="?page=hdvtjbvhfnyg&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&hdvtjbvhfnyg=<?php echo $data_rinci_tmpl['id_kls'];?>&rdtd56tftrdtrstgcb=ctjhhjb" target="blank" title="Cetak Jadwal"><i class="fa fa-print pull-right"><strong> Cetak Jadwal</strong></i>
							<br><i class="fa fa-clock-o pull-right"> <?php echo $data_tgl_kls_format['tgl']; ?></i>
							</a>
						</div>
					<?php
						$sqlrincian_sub = mysql_query("select*from subjek natural join kelas where id_kls='".$data_rinci_tmpl['id_kls']."' and hps_sub='no' order by wkt_hari_sub desc")
						or die (mysql_error());
						$ttl_sub=mysql_num_rows($sqlrincian_sub);
						
						$sqlrincian_sub_tev = mysql_query("select*from even natural join subjek natural join kelas where id_kls='".$data_rinci_tmpl['id_kls']."' and hps_sub='no'")
						or die (mysql_error());
						$ttl_sub_tev=mysql_num_rows($sqlrincian_sub_tev);
						$cek_sub_null=mysql_num_rows($sqlrincian_sub_tev);
						
						$sqlrincian_sub_tev_1 = mysql_query("select*from even natural join subjek natural join kelas where id_kls='".$data_rinci_tmpl['id_kls']."' and hps_sub='no' and selesai_ev='Sudah Selesai'")
						or die (mysql_error());
						$ttl_sub_tev_1=mysql_num_rows($sqlrincian_sub_tev_1);
						
						if ($cek_sub_null >=1 ){
						$ttl_sub_tev_persen = $ttl_sub_tev_1 / $ttl_sub_tev * 100;
						}else{
						$ttl_sub_tev_persen = 0;	
						}
					?>	 
					<a class="collapse-link" title="Klik untuk menampilkan / menyembunyikan">
						<div class="col-md-5 col-sm-8 col-xs-8" title="Even diselesaikan dalam persen '%'. Klik untuk menampilkan / menyembunyikan">
							<input type="text" class="range_26" value="0;<?php echo $ttl_sub_tev_persen;?>" name="range" style="color:white;"/>
						</div>
							<ul class="nav navbar-right panel_toolbox pull-right">
								<li><i class="fa fa-chevron-up pull-right"></i>
								</li>
								<a href="?page=hdvtjbvhfnyg&uhbfdsgq=Tambah Subjek&hdvtjbvhfnyg=<?php echo $data_rinci_tmpl['id_kls'];?>">
								<li title="Total Subjek. Klik untuk menambahkan Subjek"><span class="glyphicon glyphicon-book"></span><span class="badge bg-orange" style="color:white;"><?php echo $ttl_sub;?></span>
								</li>
								</a>
								<li title="Total Even. Klik untuk menambahkan Even">
								<a href="?page=hdvtjbvhfnyg&uhbfdsgq=Tambah Even&hdvtjbvhfnyg=<?php echo $data_rinci_tmpl['id_kls'];?>">
								<span class="glyphicon glyphicon-tasks"></span><span class="badge bg-blue" style="color:white;"><?php echo $ttl_sub_tev;?></span>
								</a>
							    </li>
							</ul>
						<div class="clearfix"></div>
					</a>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
					<?php
					while ($data_rinci_tmpl_sub = mysql_fetch_array($sqlrincian_sub)) {
					 ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="x_panel">
						  <?php
								$sqlrincian_ev = mysql_query("select*from even natural join subjek where id_sub='".$data_rinci_tmpl_sub['id_sub']."' and hps_sub='no' order by tgl_ev")
								or die (mysql_error());
								$ttl_ev=mysql_num_rows($sqlrincian_ev);
								$cek_ev_null=mysql_num_rows($sqlrincian_ev);
								
								$sqlrincian_ev_b = mysql_query("select*from even natural join subjek where id_sub='".$data_rinci_tmpl_sub['id_sub']."' and hps_sub='no' and selesai_ev='Belum Selesai' order by tgl_ev")
								or die (mysql_error());
								$ttl_ev_b=mysql_num_rows($sqlrincian_ev_b);
								
								if ($cek_ev_null >=1 ){
									$ttl_ev_s = $ttl_ev - $ttl_ev_b;
									$ttl_ev_persen = $ttl_ev_s / $ttl_ev * 100;
								}else{
									$ttl_ev_s = 0;
									$ttl_ev_persen = 0;
								}
						  ?>	 
						  <div class="x_title">
							<a class="collapse-link" title="Klik untuk menampilkan / menyembunyikan">
								<h2><?php echo $data_rinci_tmpl_sub['nama_sub']; ?></h2>
								<ul class="nav navbar-right panel_toolbox pull-right">
									<li title="Even Belum Selesai pada Subjek ini"><span class="glyphicon glyphicon-tasks"></span><span class="badge bg-red" style="color:white;"><?php echo $ttl_ev_b;?></span>
									</li>
									<li title="Even Telah Selesai pada Subjek ini"><span class="glyphicon glyphicon-tasks"></span><span class="badge bg-green" style="color:white;"><?php echo $ttl_ev_s;?></span>
									</li>
									<li title="Semua Even pada Subjek ini"><span class="glyphicon glyphicon-tasks"></span><span class="badge bg-blue" style="color:white;"><?php echo $ttl_ev;?></span>
									</li>
									<li><i class="fa fa-chevron-up pull-right"></i>
									</li>
								</ul>
								<div class="clearfix"></div>
							</a>
						  </div>
						  <div class="x_content">
							<a>
								<span class=""><p><?php echo $data_rinci_tmpl_sub['pengampu_sub']; ?></p></span>								
								<span class="pull-right" style="background-color:<?php echo $data_rinci_tmpl_sub['warna_sub']; ?>;"><p>&nbsp;&nbsp;&nbsp;</p></span>								
								<span class="pull-left"><p><strong><?php echo $data_rinci_tmpl_sub['wkt_jam_sub']; ?>.<?php echo $data_rinci_tmpl_sub['wkt_mnt_sub']; ?> WIB<br><?php echo $data_rinci_tmpl_sub['wkt_hari_sub']; ?></strong></p></span>								
								<div style="text-align: center; margin-bottom: 17px" Title="Persentase Even per Subjek">
								  <span class="chart" data-percent="<?php echo $ttl_ev_persen;?>">
													  <span class="percent"></span>
								  </span>
								</div>
							</a>
							<?php
							while ($data_rinci_tmpl_ev = mysql_fetch_array($sqlrincian_ev_b)) {
							 ?>
							 <a>
								<article class="media event">
								  <a class="pull-left date">
									<?php
										$sqltgl_ev_format = mysql_query("select DATE_FORMAT('".$data_rinci_tmpl_ev['tgl_ev']."', '%b') as bln, DATE_FORMAT('".$data_rinci_tmpl_ev['tgl_ev']."', '%d') as tgl")
										or die (mysql_error());
										$data_tgl_ev_format=mysql_fetch_array($sqltgl_ev_format);
									?>	
									<p class="month"><?php echo $data_tgl_ev_format['bln']; ?></p>
									<p class="day"><?php echo $data_tgl_ev_format['tgl']; ?></p>
								  </a>
								  <div class="media-body">
									<a class="title" href="?page=tdtfybtdsessmk&khxhjhergfbjr=<?php echo $data_rinci_tmpl_ev['tgl_ev'];?>&kytyfcdykdtrddses=<?php echo $data_rinci_tmpl['id_kls'];?>" title="Even Belum Selesai">
									<?php echo $data_rinci_tmpl_ev['nama_ev']; ?>
									</a>
									<p><?php echo $data_rinci_tmpl_ev['des_ev']; ?>.</p>
								  </div>
								</article>
							</a>
							<?php
							}
							?>							
						  </div>
						</div>
					</div>
					<?php
					}
					?>
					
					
				  </div>
				  </div>
                </div>
              </div>
			  <?php 
				}
			  ?>
			  
    
</body>
</html>