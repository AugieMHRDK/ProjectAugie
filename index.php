<?php

require_once "app/Mhsw.php";

$mhsw = new Mhsw();
	$rows = $mhsw->tampil();

    if(isset($_POST["submit"])){
        $nim = $mhsw->setNim($_POST["nim"]);
        $nama = $mhsw->setNama($_POST["nama"]);
        $alamt = $mhsw->setAlamat($_POST["alamat"]);
        $mhsw->simpan($nim,$nama,$alamt,"1");
    }    
    if(isset($_GET["nim_mhsw"])){
        $nim = $mhsw->setNim($_GET["nim_mhsw"]);
        $mhsw->delete($nim);
    }
 	if (isset($_POST["ubah"])) {
 		$nim = $mhsw->setNim($_POST["nim"]);
        $nama = $mhsw->setNama($_POST["nama"]);
        $alamt = $mhsw->setAlamat($_POST["alamat"]);
        $mhsw->edit($nim,$nama,$alamt,"1");
 	}
?>

    <form action="?" method="POST">
        <fieldset>
        <p>
            <label>NIM :</label>
            <input type="text" name="nim" placeholder="nim..." />
        </p>
        <p>
            <label>Nama :</label>
            <input type="text" name="nama" placeholder="nama..." />
        </p>
        <p>
            <label>Alamat :</label>
            <input type="text" name="alamat" placeholder="alamat..." />
        </p>

        <p>
            <input type="submit" name="submit" value="Save" />
        </p>
        </fieldset>
    

<table>
<tr>
<td>NO</td>
<td>NIM</td>
<td>NAMA</td>
<td>ALAMAT</td>
<td>AKSI</td>
</tr>

<?php foreach ($rows as $row) { ?>
<tr>
<td><?php echo $row['mhsw_id']; ?></td>
<td><?php echo "<input type='text' name='nim_mhsw' value ='".$row['mhsw_nim']."' readonly/>"; ?></td>
<td><?php echo $row['mhsw_nama']; ?></td>
<td><?php echo $row['mhsw_alamat']; ?></td>
<td><a href="index.php?nim_mhsw=<?php echo $row['mhsw_nim']; ?>">Delete</a></td>
<td><a href="index.php?nim_mhsw=<?php echo $row['mhsw_nim']; ?>">Edit</a></td>
</tr>
<?php } ?>
</table>

</form>