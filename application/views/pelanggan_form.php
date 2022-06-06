<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Pelanggan</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/csstambahdata.css') ?>">
</head>
<body>
    <div class="wrap">
      <?php echo $form_open ?>
      <?php echo $input_id ?>
      <h1>Data Pelanggan</h1>
    
<table>
  <tr class="input">
    <td>
      <?php echo $label_nama ?>
      <?php echo $error_nama ?>
      <?php echo $input_nama ?>
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_alamat ?>
      <?php echo $input_alamat ?>
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_noTelp ?>
      <?php echo $input_noTelp ?>
    </td>
  </tr>
  <tr class="input">
    <td>
      <?php echo $label_jenkel ?>
      <?php echo $input_jenkel ?>
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
