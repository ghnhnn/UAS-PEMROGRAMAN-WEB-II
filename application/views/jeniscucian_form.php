<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Jenis Cucian</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csstambahdata.css') ?>">
</head>
<body>
    <div class="wrap">
      <?php echo $form_open ?>
      <?php echo $input_id ?>
      <h1>Data Jenis Laundry</h1>
    
<table>
  <tr class="input">
    <td>
      <?php echo $label_nama_jenis ?>
      <?php echo $input_nama_jenis ?>
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

