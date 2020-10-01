<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

  <?php $this->load->view('layout/navbar') ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('servicos'); ?>">servicos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
      </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" name="form_edit">

          <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Alteração: <?php echo formata_data_banco_com_hora($servico->servico_data_alteracao); ?></strong></p>

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-user-secret"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-4">
               <label>Servico Nome:</label>
               <input type="text" class="form-control" name="servico_nome" placeholder="Servico Nome" value="<?php echo $servico->servico_nome; ?>">
               <?php echo form_error('servico_nome', '<small class="form-text text-danger">','</small>'); ?>
             </div>
             <div class="col-md-4">
               <label>Preço:</label>
               <input type="text" class="form-control" name="servico_preco" placeholder="Preço" value="<?php echo $servico->servico_preco; ?>">
               <?php echo form_error('servico_preco', '<small class="form-text text-danger">','</small>'); ?>
             </div>
             <div class="col-md-4">
                 <label>servico Ativo:</label>
                 <select name="servico_ativo" class="form-control">
                   <option value="0" <?php echo ($servico->servico_ativo == 0 ? 'selected' : ''); ?>>Não</option>
                   <option value="1" <?php echo ($servico->servico_ativo == 1 ? 'selected' : ''); ?>>Sim</option>
                 </select>
              </div>
           </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label>Descrição:</label>
                <textarea class="form-control" name="servico_descricao" placeholder="Descrição:" value=""><?php echo $servico->servico_descricao; ?></textarea>
                <?php echo form_error('servico_descricao', '<small class="form-text text-danger">','</small>'); ?>
              </div>
            </div>
          </fieldset>

      <div class="form-group row">
        <input type="hidden" name="servico_id" value="<?php echo $servico->servico_id ?>">
      </div>


      <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
      <a href="<?php echo base_url('servicos'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
    </form>
  </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

