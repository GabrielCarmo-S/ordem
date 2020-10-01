<?php $this->load->view('layout/sidebar'); ?>

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view('layout/navbar') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('vendedores'); ?>">vendedores</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
          </nav>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <form method="POST" name="form_edit">

                <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;Ultima Alteração: <?php echo formata_data_banco_com_hora($vendedor->vendedor_data_alteracao); ?></strong></p>

                <fieldset class="mt-4 border p-2">
                  <legend class="font-small"><i class="fas fa-user-secret"></i>&nbsp;Dados Principais</legend>

                  <div class="form-group row">
                    <div class="col-md-6">
                       <label>Nome Completo:</label>
                       <input type="text" class="form-control" name="vendedor_nome_completo" placeholder="Razão Social" value="<?php echo $vendedor->vendedor_nome_completo; ?>">
                       <?php echo form_error('vendedor_nome_completo', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-3">
                       <label>CPF:</label>
                       <input type="text" class="form-control cpf" name="vendedor_cpf" placeholder="CPF" value="<?php echo $vendedor->vendedor_cpf; ?>">
                       <?php echo form_error('vendedor_cpf', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-3">
                       <label>RG:</label>
                       <input type="text" class="form-control rg" name="vendedor_rg" placeholder="RG" value="<?php echo $vendedor->vendedor_rg; ?>">
                       <?php echo form_error('vendedor_rg', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-4">
                       <label>Celular:</label>
                       <input type="text" class="form-control sp_celphones" name="vendedor_celular" placeholder="Celular" value="<?php echo $vendedor->vendedor_celular; ?>">
                       <?php echo form_error('vendedor_celular', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Email:</label>
                       <input type="email" class="form-control" name="vendedor_email" placeholder="Email" value="<?php echo $vendedor->vendedor_email; ?>">
                       <?php echo form_error('vendedor_email', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Telefone:</label>
                       <input type="text" class="form-control sp_celphones" name="vendedor_telefone" placeholder="Telefone" value="<?php echo $vendedor->vendedor_telefone; ?>">
                       <?php echo form_error('vendedor_telefone', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="mt-4 border p-2">
                  <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Dados De Endereços</legend>

                  <div class="form-group row">
                   
                    <div class="col-md-5">
                       <label>Endereço:</label>
                       <input type="text" class="form-control" name="vendedor_endereco" placeholder="Endereço" value="<?php echo $vendedor->vendedor_endereco; ?>">
                       <?php echo form_error('vendedor_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-3">
                       <label>Número Endereço:</label>
                       <input type="text" class="form-control" name="vendedor_numero_endereco" placeholder="Número Endereço:" value="<?php echo $vendedor->vendedor_numero_endereco; ?>">
                       <?php echo form_error('vendedor_numero_endereco', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Complemento:</label>
                       <input type="text" class="form-control" name="vendedor_complemento" placeholder="Complemento:" value="<?php echo $vendedor->vendedor_complemento; ?>">
                       <?php echo form_error('vendedor_complemento', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    
                  </div>

                  <div class="form-group row">
                    <div class="col-md-4">
                       <label>Bairro:</label>
                       <input type="text" class="form-control" name="vendedor_bairro" placeholder="Bairro" value="<?php echo $vendedor->vendedor_bairro; ?>">
                       <?php echo form_error('vendedor_bairro', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                     <div class="col-md-2">
                       <label>CEP:</label>
                       <input type="text" class="form-control cep" name="vendedor_cep" placeholder="CEP" value="<?php echo $vendedor->vendedor_cep; ?>">
                       <?php echo form_error('vendedor_cep', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-4">
                       <label>Cidade:</label>
                       <input type="text" class="form-control" name="vendedor_cidade" placeholder="Cidade" value="<?php echo $vendedor->vendedor_cidade; ?>">
                       <?php echo form_error('vendedor_cidade', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-2">
                       <label>UF:</label>
                       <input type="text" class="form-control" name="vendedor_estado" placeholder="UF" value="<?php echo $vendedor->vendedor_estado; ?>">
                       <?php echo form_error('vendedor_estado', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>
                </fieldset> 

                <fieldset class="mt-4 border p-2 mb-4">
                  <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                  <div class="form-group row">
                    <div class="col-md-3">
                       <label>Vendedor Ativo:</label>
                       <select name="vendedor_ativo" class="form-control">
                         <option value="0" <?php echo ($vendedor->vendedor_ativo == 0 ? 'selected' : ''); ?>>Não</option>
                         <option value="1" <?php echo ($vendedor->vendedor_ativo == 1 ? 'selected' : ''); ?>>Sim</option>
                       </select>
                    </div>
                    <div class="col-md-3">
                       <label>Matricula:</label>
                       <input type="text" class="form-control" name="vendedor_codigo" placeholder="Matricula" value="<?php echo $vendedor->vendedor_codigo; ?>">
                       <?php echo form_error('vendedor_codigo', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                    <div class="col-md-6">
                      <label>Observações:</label>
                      <textarea class="form-control" name="vendedor_obs" placeholder="Observações:" value=""><?php echo $vendedor->vendedor_obs; ?></textarea>
                       <?php echo form_error('vendedor_obs', '<small class="form-text text-danger">','</small>'); ?>
                    </div>
                  </div>
                </fieldset>  

                <div class="form-group row">
                  <input type="hidden" name="vendedor_id" value="<?php echo $vendedor->vendedor_id ?>">
                </div>
                
     
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a href="<?php echo base_url('vendedores'); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

     