jQuery(document).ready(function () {
  carregar_categorias();
  jQuery("#cadastrar_item").on("click", function () {
    const titulo = jQuery("#titulo_item").val();
    const categoria = jQuery("#categoria_item").val();
    const descricao = jQuery("#descricao_item").val();
    const numero_serie = jQuery("#numero_serie").val();
    if (titulo.length > 0 && descricao.length > 0) {
      cadastrar_item(titulo, categoria, descricao, numero_serie);
      jQuery(".formulario_item").trigger("reset");
    } else {
      avisar("Campos obrigatórios estão vazios!");
    }
  });

  jQuery(".custom_nav_link").on("click", function () {
    carregar_categorias();
    jQuery("#titulo_item").val("");
    jQuery("#descricao_item").val("");
    jQuery("#nome_categoria").val("");
    jQuery("#numero_serie").val("");
  });
});

function cadastrar_item(titulo, categoria, descricao, numero_serie) {
  jQuery.ajax({
    type: "POST",
    url: "controller/controle_item.php",
    data: {
      opcao: "cadastrar",
      titulo: titulo,
      categoria: categoria,
      descricao: descricao,
      numero_serie: numero_serie,
    },
    complete: function (e, xhr, result) {
      if (e.readyState == 4 && e.status == 200) {
        try {
          var msg = e.responseText;
          console.log(e);
        } catch (err) {
          console.log(err);
        }
        avisar(msg);
      } else {
        console.log("erro " + e.status);
      }
    },
  });
}

function carregar_categorias() {
  jQuery.ajax({
    type: "POST",
    url: "controller/controle_categoria.php",
    data: {
      opcao: "consultar",
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
          jQuery("#categoria_item").html("");
          categorias.map((categorias) => {
            jQuery("#categoria_item").append(`
                        <option value="${categorias.id}">${categorias.nome}</option>
                        `);

            jQuery("#categoria_item").removeAttr("disabled");
          });
        } else {
        }
      } else {
      }
    },
  });
}
