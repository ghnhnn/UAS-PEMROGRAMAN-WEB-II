<table class="table table-striped">
  <tr>
   <th>#</th>
   <th>Nama</th>
   <th>Tanggal Masuk</th>
   <th>Tanggal Keluar</th>
   <th>Berat</th>
   <th>Jumlah Paket</th>
   <th>Jenis Laundry</th>
   <th>Jenis Cucian</th>
   <th>Bayar</th>
   <th>Total Bayar</th>
  </tr>
  <?php $no=1; foreach ($transaksi as $row): ?>
   <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $row->nama ?></td>
    <td><?php echo $row->tanggalmasuk ?></td>
    <td><?php echo $row->tanggalkeluar ?></td>
    <td><?php echo $row->berat ?></td>
    <td><?php echo $row->banyakpaket ?></td>
    <td><?php echo $row->nama_jenis ?></td>
    <td><?php echo $row->nama_pakaian ?></td>
    <td><?php echo $row->bayar ?></td>
    <td><?php echo $row->totalbayar ?></td>
   </tr>
  <?php endforeach ?>
 </table>
 <a href="<?= site_url('Cetak_Filter/cetak/'. $id_pelanggan) ?>" target="_blank" class="btn btn-warning">Cetak Laporan</a>