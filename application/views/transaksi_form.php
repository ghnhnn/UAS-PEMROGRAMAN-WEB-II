<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Transaksi</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csstambahtransaksi.css') ?>">
</head>
<body>
    <div class="wrap">
      <?php echo $form_open ?>
      <?php echo $input_id ?>
      <h1>Data Transaksi</h1>
    
<table>
  <tr class="input">
    <td>
      <?php echo $label_pelanggan ?>
      <br>
      <?php echo $dropdown_pelanggan ?>
      <br>
      <br>
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_tanggalmasuk ?>
       <input type="date" name="tanggalmasuk" value="<?php echo isset($itemOutData->tanggalmasuk) ? set_value('tanggalmasuk', date('d/m/Y', strtotime($itemOutData->tanggalmasuk))) : set_value('tanggalmasuk'); ?>">
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_tanggalkeluar ?>
       <input type="date" name="tanggalkeluar" value="<?php echo isset($itemOutData->tanggalkeluar) ? set_value('tanggalkeluar', date('d/m/Y', strtotime($itemOutData->tanggalkeluar))) : set_value('tanggalkeluar'); ?>">
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_berat ?>
      <?php echo $input_berat ?>
    </td>
  </tr>
  <tr colspan-="3" class="input">
    <td>
      <?php echo $label_jeniscucian ?>
      <br>
      <?php echo $dropdown_jeniscucian ?>
      <br>
      <br>
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_pakaian ?>
      <br>
      <?php echo $dropdown_pakaian ?>
      <br>
      <br>
    </td>
  </tr>
  <tr class="input">
    <td>
        <?php echo $label_bayar ?>
        <?php echo $input_bayar ?>
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_totalbayar ?>
      <?php echo $input_totalbayar ?>
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $form_submit ?>
      <?php echo $form_reset ?>
    </td>
  </tr>
  <tr>
    <td>
    </td>
  </tr>
</table>
<?php echo form_close() ?>

      </div>
</body>
</html>
