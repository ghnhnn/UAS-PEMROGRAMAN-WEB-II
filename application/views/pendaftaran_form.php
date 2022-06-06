<table border=0 align="CENTER">
  <tr ALIGN=CENTER>
   	<td colspan="3">
   		<img src="<?php echo base_url('assets/LogoPoliban_lastEdit.png') ?>">
    </td>
  </tr>
  <tr ALIGN=CENTER>
   	<td colspan="3">
   		<h2 align="CENTER">Form Pendaftaran Mahasiswa Baru</h2>
    </td>
  </tr>
<?php echo $form_open ?>
<?php echo $input_id ?>
<table border=0 align="CENTER">
  <tr>
    <td>
     	<?php echo $label_nama ?>
		<?php echo $error_nama ?>
      
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $input_nama ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $label_jenkel ?>
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $dropdown_jenkel ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $label_status ?>
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $dropdown_status ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $label_lulusan_sekolah ?>
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $input_lulusan_sekolah ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $label_tahun ?>
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $dropdown_tahun ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $label_pekerjaan ?>
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $input_pekerjaan ?>
    </td>
  </tr>
  <tr>
    <td>
      	<?php echo $label_alamat ?>
		<?php echo $error_alamat ?>
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $input_alamat ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $label_kelurahan ?>
  
    </td>
    <td>
         :
    </td>
    <td>
      <?php echo $input_kelurahan ?>
    </td>
  </tr>
  <tr ALIGN=CENTER>
    <td COLSPAN=3>
    </td>
  </tr>
  <tr ALIGN=CENTER>
    <td COLSPAN=3>
    </td>
  </tr>
  <tr ALIGN=CENTER>
    <td COLSPAN=3>
      <?php echo $form_submit ?>
    </td>
  </tr>
  <tr ALIGN=CENTER>
    <td COLSPAN=3>
    </td>
  </tr>
</table>
<?php echo form_close() ?>



