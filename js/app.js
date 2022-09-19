$(document).ready(function () {
  var table = $('#example').DataTable({
  /*   language: {
      url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-CO.json"
  } */
  });


  $("#btn_buscar").click(function () {
    var dato = $("#search").val();
    if (dato === "") {
      //alert("campo vacio.");
      Swal.fire("CAMPO VACÍO, DIGITE UN VALOR VÁLIDO.");
      return false;
    } else {
      $.ajax(
        {
          url: "js/procesar.php",
          type: "POST",
          dataType: "html",
          data: "search=" + dato + "&tarea=search",
          success: function (response) {
            let lstUsuarios = JSON.parse(response);
            console.log(lstUsuarios);
            //let template = "";
            var dataTable = $('#example').DataTable();
            lstUsuarios.forEach((element) => {
              dataTable.row.add([element.id,element.usuario,element.email,element.fechaIngreso]).draw();

           /*     template += `<tr>
             <td>${element.id} </td>`+ 
            `<td>${element.usuario} </td>`+ 
            `<td>${element.email} </td>`+
            `<td>${element.fechaIngreso} </td>
            </tr>`
              // otro metodo de visualizar en el html o plantilla
             lista = document.getElementById("tasks");
              var tr = document.createElement("tr");

              var columna1 = document.createElement("th");
              columna1.innerHTML = element.id;

              var columna2 = document.createElement("th");
              columna2.innerHTML = element.usuario;

              var columna3 = document.createElement("th");
              columna3.innerHTML = element.email;

              var columna4 = document.createElement("th");
              columna4.innerHTML = element.fechaIngreso;

              lista.appendChild(tr);
              tr.appendChild(columna1);
              tr.appendChild(columna2);
              tr.appendChild(columna3);
              tr.appendChild(columna4);*/
            });
           // $('#example').html(template);
            
          }, //success
        } //sino
      );


    } //fin del if
  }); //fin del evento del control

  $("#task-form").submit(function (e) {
    //console.log('enviando');
    const postData = {
      name: $("#usuario").val(),
      descripcion: $("#email").val(),
      password: $("#pass").val(),
    };

    $.ajax({
      url: "js/procesar.php",
      type: "POST",
      dataType: "json",
      data: "name=" + postData[0] + "&tarea=save",
      success: function (response) {},
    });

    e.preventDefault(); //cancelar el envio del formulario
  }); //fin val task-form

  
  $('#example tbody').on('click', 'tr', function () {
    var data = table.row(this).data();
    alert('You clicked on ' + data[1] + "'s row");
  });

});
