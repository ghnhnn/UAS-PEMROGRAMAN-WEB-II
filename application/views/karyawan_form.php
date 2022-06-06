<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Karyawan</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csstambahdata.css') ?>">
</head>
<body>
  <div class="wrap">
    <?php echo $form_open ?>
    <?php echo $input_id ?>
    <h1>Data Karyawan</h1>
  <table>
    <tr class="input">
      <td>
          <?php echo $label_nama_karyawan ?>
          <?php echo $input_nama_karyawan ?>
      </td>    
    </tr>
    <tr class="input">
      <td>
          <?php echo $label_alamat_karyawan ?>
          <?php echo $input_alamat_karyawan ?>
      </td>
    </tr>
    <tr class="input">
      <td>
        <?php echo $label_noTelp ?>
        <?php echo $input_noTelp ?>
      </td>
    </tr>
    <tr class="input">
      <td >
          <?php echo $form_submit ?>
          <?php echo $form_reset ?>
      </td>
    </tr>
</table>
</div>
</body>
</html>




