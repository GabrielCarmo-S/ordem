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

          <fieldset class="mt-4 border p-2">
            <legend class="font-small"><i class="fas fa-user-secret"></i>&nbsp;Dados Principais</legend>

            <div class="form-group row">
              <div class="col-md-4">
               <label>Servico Nome:</label>
               <input type="text" class="form-control" name="servico_nome" placeholder="Servico Nome" value="<?php echo set_value('servico_nome'); ?>">
               <?php echo form_error('servico_nome', '<small class="form-text text-danger">','</small>'); ?>
             </div>
             <div class="col-md-4">
               <label>Preço:</label>
               <input type="text" class="form-control" name="servico_preco" placeholder="Preço" value="<?php echo set_value('servico_preco'); ?>">
               <?php echo form_error('servico_preco', '<small class="form-text text-danger">','</small>'); ?>
             </div>
             <div class="col-md-4">
                 <label>servico Ativo:</label>
                 <select name="servico_ativo" class="form-control">
                   <option value="0">Não</option>
                   <option value="1">Sim</option>
                 </select>
              </div>
           </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label>Descrição:</label>
                <textarea class="form-control" name="servico_descricao" placeholder="Descrição:" value=""><?php echo set_value ('servico_descricao');?></textarea>
                <?php echo form_error('servico_descricao', '<small class="form-text text-danger">','</small>'); ?>
              </div>
            </div>
          </fieldset>



      <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
      <a href="<?php echo base_url('servicos'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
    </form>
  </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

