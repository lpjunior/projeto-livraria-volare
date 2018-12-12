<?php

$cargos = array(
  # Inicio do array de Gerente de Produto
  array(
    "cargo" => "Gerente de Produto",
    "subordinados" => array(
      # Inicio do array de Especialista de Programação
      array(
        "cargo" => "Especialista de Programação",
        "subordinados" => array(
          # Inicio do array de Coordenador Técnico de Programação
          array(
            "cargo" => "Coordenador Técnico de Programação",
            "subordinados" => array(
              # Inicio do array de Instrutores de Programação
              array(
                "cargo" => "Instrutor de Programação Web"
              ),
              array(
                "cargo" => "Instrutor de Programação Mobile"
              )
            # Fim do array de Instrutores de Programação
            )
          # Fim do array de Coordenador Técnico de Programação
          )
        )
      # Fim do array de Especialista de Programação
      ),
      array(
        "cargo" => "Especialista de Infraestrutura",
        "subordinados" => array(
          # Inicio do array de Coordenador Técnico de Infraestrutura
          array(
            "cargo" => "Coordenador Técnico de Infraestrutura",
            # Inicio do array de Instrutores de Infraestrutura
            "subordinados" => array(
              array(
                "cargo" => "Instrutor de Programação Redes"
              ),
              array(
                "cargo" => "Instrutor de Programação CCNA"
              )
              # Fim do array de Instrutores de Infraestrutura
            )
          # Fim do array de Coordenador Técnico de Infraestrutura
          )
        )
      # Fim do array de Especialista de Infraestrutura
      )
    )
  # Fim do array de Gerente de Produto
  )
);

function montaEstrutura($cargos) {

  $html = "<ul>";

  foreach($cargos as $cargo) {

    $html .= "<li>";
    $html .= $cargo['cargo'];

    if(isset($cargo['subordinados']) && count($cargo['subordinados'] > 0)) {
      $html .= montaEstrutura($cargo['subordinados']);
    }

    $html .= "</li>";
  }

  $html .= "</ul>";

  return $html;
}

echo montaEstrutura($cargos);
