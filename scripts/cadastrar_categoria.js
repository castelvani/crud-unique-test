jQuery(document).ready(function () {
  jQuery("#cadastrar_categoria").on("click", function () {
    const nome_categoria = jQuery("#nome_categoria").val();
    if (nome_categoria.length > 0) {
      cadastrar_categoria(nome_categoria);
      jQuery(".formulario_categoria").trigger("reset");
    } else {
      avisar("Campos obrigatórios estão vazios!");
    }
  });

  jQuery(".custom_nav_link").on("click", function () {
    carregar_categorias();
  });
});

function cadastrar_categoria(nome_categoria) {
  jQuery.ajax({
    type: "POST",
    url: "controller/controle_categoria.php",
    data: {
      opcao: "cadastrar",
      nome_categoria: nome_categoria,
    },
    complete: function (e, xhr, result) {
      if (e.readyState == 4 && e.status == 200) {
        try {
          var msg = e.responseText;
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
