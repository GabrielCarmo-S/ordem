<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar') ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('marcas'); ?>">marcas</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" name="form_edit">

          <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Alteração: <?php echo formata_data_banco_com_hora($marca->marca_data_alteracao); ?></strong></p>

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-cubes"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-8">
               <label>Marca Nome:</label>
               <input type="text" class="form-control" name="marca_nome" placeholder="Marca Nome" value="<?php echo $marca->marca_nome; ?>">
               <?php echo form_error('marca_nome', '<small class="form-text text-danger">','</small>'); ?>
             </div>
             <div class="col-md-4">
                 <label>Marca Ativa:</label>
                 <select name="marca_ativa" class="form-control">
                   <option value="0" <?php echo ($marca->marca_ativa == 0 ? 'selected' : ''); ?>>Não</option>
                   <option value="1" <?php echo ($marca->marca_ativa == 1 ? 'selected' : ''); ?>>Sim</option>
                 </select>
              </div>
           </div>
          
          </fieldset>

      <div class="form-group row">
        <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id ?>">
      </div>


      <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
      <a href="<?php echo base_url('marcas'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
    </form>
  </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

