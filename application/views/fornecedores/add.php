<?php $this->load->view('layout/sidebar'); ?>

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view('layout/navbar') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('fornecedores'); ?>">Fornecedores</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
          </nav>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <form method="POST" name="form_add">

                <fieldset class="mt-4 border p-2">
                  <legend class="font-small"><i class="fas fa-user-tag"></i>&nbsp;Dados Principais</legend>

                  <div class="form-group row">
                    <div class="col-md-6">
                       <label>Razão Social:</label>
                       <input type="text" class="form-control" name="fornecedor_razao" placeholder="Razão Social" value="<?php echo set_value ('fornecedor_razao'); ?>">
                       <?php echo form_error('fornecedor_razao', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-6">
                       <label>Nome Fantasia:</label>
                       <input type="text" class="form-control" name="fornecedor_nome_fantasia" placeholder="Nome Fantasia" value="<?php echo set_value ('fornecedor_nome_fantasia'); ?>">
                       <?php echo form_error('fornecedor_nome_fantasia', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                   <div class="col-md-4">
                      <label>CNPJ:</label>
                      <input type="text" class="form-control cnpj" name="fornecedor_cnpj" placeholder="CNPJ" value="<?php echo set_value ('fornecedor_cnpj'); ?>">
                          <?php echo form_error('fornecedor_cnpj', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Inscrição Estadual:</label>
                       <input type="text" class="form-control cnpj" name="fornecedor_ie" placeholder="I.E do Fornecedor" value="<?php echo set_value ('fornecedor_ie'); ?>">
                       <?php echo form_error('fornecedor_ie', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Telefone:</label>
                       <input type="text" class="form-control sp_celphones" name="fornecedor_telefone" placeholder="Telefone" value="<?php echo set_value ('fornecedor_telefone'); ?>">
                       <?php echo form_error('fornecedor_telefone', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-4">
                       <label>Celular:</label>
                       <input type="text" class="form-control sp_celphones" name="fornecedor_celular" placeholder="Celular" value="<?php echo set_value ('fornecedor_celular'); ?>">
                       <?php echo form_error('fornecedor_celular', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Email:</label>
                       <input type="email" class="form-control" name="fornecedor_email" placeholder="Email" value="<?php echo set_value ('fornecedor_email'); ?>">
                       <?php echo form_error('fornecedor_email', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Atendente:</label>
                       <input type="text" class="form-control" name="fornecedor_contato" placeholder="Atendente" value="<?php echo set_value ('fornecedor_contato'); ?>">
                       <?php echo form_error('fornecedor_contato', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="mt-4 border p-2">
                  <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Dados De Endereços</legend>

                  <div class="form-group row">
                   
                    <div class="col-md-5">
                       <label>Endereço:</label>
                       <input type="text" class="form-control" name="fornecedor_endereco" placeholder="Endereço" value="<?php echo set_value ('fornecedor_endereco'); ?>">
                       <?php echo form_error('fornecedor_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-3">
                       <label>Número Endereço:</label>
                       <input type="text" class="form-control" name="fornecedor_numero_endereco" placeholder="Número Endereço:" value="<?php echo set_value ('fornecedor_numero_endereco'); ?>">
                       <?php echo form_error('fornecedor_numero_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Complemento:</label>
                       <input type="text" class="form-control" name="fornecedor_complemento" placeholder="Complemento:" value="<?php echo set_value ('fornecedor_complemento'); ?>">
                       <?php echo form_error('fornecedor_complemento', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    
                  </div>

                  <div class="form-group row">
                    <div class="col-md-4">
                       <label>Bairro:</label>
                       <input type="text" class="form-control" name="fornecedor_bairro" placeholder="Bairro" value="<?php echo set_value ('fornecedor_bairro');?>">
                       <?php echo form_error('fornecedor_bairro', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                     <div class="col-md-2">
                       <label>CEP:</label>
                       <input type="text" class="form-control cep" name="fornecedor_cep" placeholder="CEP" value="<?php echo set_value ('fornecedor_cep'); ?>">
                       <?php echo form_error('fornecedor_cep', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Cidade:</label>
                       <input type="text" class="form-control" name="fornecedor_cidade" placeholder="Cidade" value="<?php echo set_value ('fornecedor_cidade'); ?>">
                       <?php echo form_error('fornecedor_cidade', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-2">
                       <label>UF:</label>
                       <input type="text" class="form-control" name="fornecedor_estado" placeholder="UF" value="<?php echo set_value ('fornecedor_estado'); ?>">
                       <?php echo form_error('fornecedor_estado', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>
                </fieldset> 

                <fieldset class="mt-4 border p-2 mb-4">
                  <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                  <div class="form-group row">
                    <div class="col-md-4">
                       <label>fornecedor Ativo:</label>
                       <select name="fornecedor_ativo" class="form-control">
                         <option value="0">Não</option>
                         <option value="1">Sim</option>
                       </select>
                    </div>
                    <div class="col-md-8">
                      <label>Observações:</label>
                      <textarea class="form-control" name="fornecedor_obs" placeholder="Observações:" value=""><?php echo set_value ('fornecedor_obs'); ?></textarea>
                       <?php echo form_error('fornecedor_obs', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>
                </fieldset>  
                
     
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a href="<?php echo base_url('fornecedores'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

     