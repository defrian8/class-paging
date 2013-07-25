<?php
  mysql_connect("localhost","root","");
	mysql_select_db("def_proposal_uin") or die ("Database Tidak Ditemukan"); // databasenya bikin sendiri yaa
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR."paging.php";
?>
<table align="center" style="text-decoration:none">
	<tr>
		<th width="100">Nim</th>
		<th width="280">Nama</th>
	</tr>
	<?php 
		$p = new paging(); 		//buat objek dari paging
		$page = isset($_GET['page'])?$_GET['page']:1;
		$perPage=10; 			// jumlah data yang akan ditampilkan
		$totPage = mysql_num_rows(mysql_query("select * from mahasiswa")); //hitung jumlah data yang ada di DB
		$set =array( // konfigurasi
			'url'=>'paging_test.php?page',
			'perPage'=> $perPage,
			'curPage'=>$page,
			'totPage'=>$totPage
		);	
		$p->init($set);
		$offset = $p->offset();
		$sql = mysql_query("select * from mahasiswa limit $offset,$perPage");
	while($r = mysql_fetch_array($sql)){?>
	<tr>
		<td><?= $r['nim'];?></td>
		<td><?= $r['nama_lengkap'];?></td>
	</tr>
	<?php
	}
	
	echo $p->navigasi(); // buat navigasi hal 1 2 3 4 dst (belum termasuk css)
	
	?>
</table>
