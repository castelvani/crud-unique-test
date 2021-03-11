jQuery(document).ready(function () {
  consultar_categoria();
});

function consultar_categoria() {
  jQuery.ajax({
    type: "POST",
    url: "controller/controle_categoria.php",
    data: {
      opcao: "consultar",
    },
    beforeSend: function () {
      jQuery("#tabela_categoria").html("");
    },
    complete: function (e, xhr, result) {
      if (e.readyState == 4 && e.status == 200) {
        try {
          var Obj = JSON.parse(e.responseText);
        } catch (err) {
          console.log("Erro na conversão do objeto JSON em Javascript!!!");
          console.log(err);
        }

        if (Obj != null) {
          var categorias = Obj;
          categorias.map((categorias) => {
            jQuery("#tabela_categoria").append(`
                            <tr>
                                <td>${categorias.id}</td>
                                <td>${categorias.nome}</td>
                                <td><i type="submit" class="fas fa-trash btn_apagar id_${categorias.id}"></i></td>
                            </tr>
                        `);

            jQuery(`.id_${categorias.id}`).on("click", function () {
              jQuery(`.apagar_form`).submit(function (event) {
                event.preventDefault();
              });
              remover_categoria(categorias.id);
            });
          });
          if (categorias.length == 0) {
            jQuery("#tabela_categoria").append(`
                            <tr>        
                                <td colspan="3" class="categoria_nula">Não há categorias registradas</td>
                            </tr>
                        `);
          }
        } else {
        }
      } else {
      }
    },
  });
}

function remover_categoria(id_categoria) {
  jQuery.ajax({
    type: "POST",
    url: "controller/controle_categoria.php",
    data: {
      opcao: "remover",
      id_categoria: id_categoria,
    },
    complete: function (e, xhr, result) {
      if (e.readyState == 4 && e.status == 200) {
        try {
          var msg = e.responseText;
        } catch (err) {
          console.log(err);
        }
        consultar_categoria();
        avisar(msg);
      } else {
        console.log("erro " + e.status);
      }
    },
  });
}
