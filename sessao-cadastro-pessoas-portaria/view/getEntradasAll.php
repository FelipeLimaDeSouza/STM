							<?php

								$dados_all = $control->retornaTodasEntradas();

								foreach ($dados_all as $reg) {

									$data_br = implode('/', array_reverse(explode('-', $reg->entrada_data_entrada)));

									$data_saida_br = implode('/', array_reverse(explode('-', $reg->entrada_data_saida)));

									$veiculos = $controlVeiculos->retornaVeiculoPessoa($reg->pessoa_id);

									$placa = null;

									foreach ($veiculos as $reg_veiculo) {
										
										$placa = $reg_veiculo->veiculo_placa;

									}

									echo "<tr>

											<td> ".$data_br."</td>

										<td>".$reg->pessoa_nome."</td>

										<td>".$reg->pessoa_rg."</td>

										<td>".$reg->pessoa_cpf."</td>

										<td>".$reg->empresa_nome."</td>";

									if($placa != null){

										echo "<td>".$placa."</td>";

									}else{

										echo "<td></td>";

									}

									echo "<td>".$reg->funcionario_nome."</td>

										<td>".$reg->entrada_hora_entrada."</td>

										<td>".$reg->entrada_hora_saida."</td>

										<td>".$data_saida_br."</td>

										<td>".$reg->usuario_nome."</td>

										</tr>";

								}

							?>