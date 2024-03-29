<div class="container">
     <fieldset>
          <div class="form-group ">
               <input id="hdnCliente" class="form-control input-sm" readonly type="hidden">
               <label for="txtCedula">Cédula :</label>
               <input id="txtCedula" class="form-control input-sm" readonly>
               <div class="spacer"></div>
               <label for="txtNombre">Nombres:</label>
               <input id="txtNombre" class="form-control input-sm" readonly>
               <label for="txtEmail">Correo electrónico:</label>
               <input id="txtEmail" class="form-control input-sm" readonly>

          </div>
     </fieldset>
     <fieldset>
          <label for="cmbGrupo" style="width:100%;">Grupo Sanguineo :</label>
          <input id="cmbGrupo" style="width:100%;" class="form-control">
          <label for="cmbJerarquia" style="width:100%;">Jerarquía :</label>
          <input id="cmbJerarquia" class="form-control" style="width:100%;">
          <label for="cmbCargo" style="width:100%;">Cargo :</label>
          <input id="cmbCargo" class="form-control" style="width:100%;">
          <label for="cmbNacimiento" style="width:100%;">Lugar de nacimiento :</label>
          <input id="cmbNacimiento" class="form-control" style="width:100%;">
          <label for="dtFechaNac" style="width:100%;">Fecha de Nacimiento:</label>
          <input id="dtFechaNac" value="01/01/2002" title="datepicker" class="form-control" style="width:100%;" />
          <label for="txtTelefonoFijo" style="width:100%;">Teléfono Fijo :</label>
          <input id="txtTelefonoFijo" class="form-control input-sm" style="width:100%;">
          <label for="cmbGrado" style="width:100%;">Grado de Instrucción :</label>
          <input id="cmbGrado" class="form-control" style="width:100%;">
          <label for="txtEspecialidad" style="width:100%;">Especialidad :</label>
          <input id="txtEspecialidad" class="form-control input-sm" style="width:100%;">
          <label for="txtUnidad" style="width:100%;"> Unidad de procedencia :</label>
          <input id="txtUnidad" class="form-control input-sm" style="width:100%;">
          <label for="dtFechaAscenso" style="width:100%;">Fecha Ult. Ascenso:</label>
          <input id="dtFechaAscenso" value="01/01/2002" title="datepicker" class="form-control" style="width:100%;" />
          <label for="cmbEstadoCivil" style="width:100%;">Estado Civil :</label>
          <input id="cmbEstadoCivil" class="form-control" style="width:100%;">
          <label for="txtEstatura" style="width:100%;">Estatura:</label>
          <input id="txtEstatura" class="form-control input-sm" style="width:100%;">
          <label for="txtPeso" style="width:100%;">Peso:</label>
          <input id="txtPeso" class="form-control input-sm" style="width:100%;">
          <label for="cmbCamisa" style="width:100%;">Talla camisa :</label>
          <input id="cmbCamisa" class="form-control" style="width:100%;">
          <label for="cmbPantalon" style="width:100%;">Talla pantalon :</label>
          <input id="cmbPantalon" class="form-control" style="width:100%;">
          <label for="cmbCalzado" style="width:100%;">Talla calzado :</label>
          <input id="cmbCalzado" class="form-control" style="width:100%;">
          <label for="cmbGorra" style="width:100%;">Talla gorra :</label>
          <input id="cmbGorra" class="form-control" style="width:100%;">
          <label for="txtConyugue" style="width:100%;">Conyuge :</label>
          <input id="txtConyugue" class="form-control input-sm" style="width:100%;">
          <label for="txtPadre" style="width:100%;">Padre :</label>
          <input id="txtPadre" class="form-control input-sm" style="width:100%;">
          <label for="txtMadre" style="width:100%;">Madre :</label>
          <input id="txtMadre" class="form-control input-sm" style="width:100%;">
          <label for="txtDireccionEmergencia" style="width:100%;">Dirección de emergencia :</label>
          <input id="txtDireccionEmergencia" class="form-control input-sm" style="width:100%;">
     </fieldset>
     <fieldset>
          <div id="grid_hijos"></div>
     </fieldset>
     <button id="btnGuardar" class='btn-primary'>Guardar</button>
</div>
<script>
     $(function() {
          $("#grid_hijos").kendoGrid({
               editable: "inline",
               toolbar: [{
                    name: "create",
                    text: "Agregar hijo"
               }],
               columns: [{
                         field: "id",
                         hidden: true
                    },
                    {
                         field: "nombre",
                         title: "Nombre del hijo",
                         width: "200px"
                    },
                    {
                         field: "fecha_nac",
                         title: "Fecha de Nac.",
                         width: "210px",
                         template: '#= kendo.toString(fecha_nac, "dd/MM/yyyy") #'
                    },
                    {
                         field: "cod_datos_sexo",
                         title: "Sexo",
                         width: "210px",
                         template: "#=nom_sexo#",
                         editor: function(container) {
                              var input = $("<input id='cod_datos_sexo' name='cod_datos_sexo'>");
                              input.appendTo(container);
                              input.kendoDropDownList({
                                   dataSource: getDataSource(C_SEXO, '../', 'sexo'),
                                   dataTextField: "nom_sexo",
                                   dataValueField: "cod_datos_sexo"
                              }).appendTo(container);
                         },
                         headerAttributes: {
                              style: "font-weight: bold;"
                         }
                    },
                    {
                         command: ["edit", "destroy"]
                    },
               ],
               dataSource: {
                    type: "json",
                    transport: {
                         read: {
                              url: "../Clientes/getHijos",
                              dataType: "json",
                              type: "GET",
                              data: {
                                   cod_cliente: <?php echo $cod_cliente; ?>
                              }
                         },
                         create: {
                              url: "../Clientes/guardarHijo",
                              dataType: "json",
                              type: "POST",
                              data: {
                                   cod_cliente: <?php echo $cod_cliente; ?>
                              }
                         },
                         update: {
                              url: "../Clientes/guardarHijo",
                              dataType: "json",
                              type: "POST",
                              data: {
                                   cod_cliente: <?php echo $cod_cliente; ?>
                              }
                         },
                         destroy: {
                              url: "../Clientes/eliminarHijo",
                              dataType: "json",
                              type: "POST"
                         }
                    },
                    schema: {
                         model: {
                              id: "id",
                              fields: {
                                   nombre: {
                                        type: "string",
                                        editable: true
                                   },
                                   fecha_nac: {
                                        type: "string",
                                        editable: true
                                   },
                                   cod_datos_sexo: {
                                        type: "number",
                                        editable: true
                                   },
                                   nom_sexo: {
                                        type: "string",
                                        editable: true
                                   },
                              }
                         }
                    },
                    pageSize: 20
               },
          });
          $("#dtFechaNac").kendoDatePicker({
               start: 'year',
               depth: 'day',
               format: 'dd/MM/yyyy',
               dateInput: true
          });
          $("#dtFechaAscenso").kendoDatePicker({
               start: 'year',
               depth: 'day',
               format: 'dd/MM/yyyy',
               dateInput: true
          });

          $("#btnGuardar").kendoButton({
               click: onClick
          });
          $("#cmbGrupo").kendoComboBox({
               dataSource: getDataSource(C_GRUPO_SANGUINEO),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbJerarquia").kendoComboBox({
               dataSource: getDataSource(C_JERARQUIA),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbNacimiento").kendoComboBox({
               dataSource: getDataSource(C_ESTADOS),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbCargo").kendoComboBox({
               dataSource: getDataSource(C_CARGO),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbGrado").kendoComboBox({
               dataSource: getDataSource(C_GRADO),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbCamisa").kendoComboBox({
               dataSource: getDataSource(C_TALLA_CAMISA),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbPantalon").kendoComboBox({
               dataSource: getDataSource(C_TALLA_PANTALON),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbCalzado").kendoComboBox({
               dataSource: getDataSource(C_TALLA_CALZADO),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbGorra").kendoComboBox({
               dataSource: getDataSource(C_TALLA_GORRA),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          $("#cmbEstadoCivil").kendoComboBox({
               dataSource: getDataSource(C_ESTADO_CIVIL),
               dataTextField: "nombre",
               dataValueField: "id"
          });
          loadData()
     })

     function loadData() {
          $("#hdnCliente").val('<?php echo $cod_cliente; ?>')
          $("#txtCedula").val('<?php echo $cedula; ?>')
          $("#txtNombre").val('<?php echo $nombres; ?>')
          $("#txtEmail").val('<?php echo $cliente['email']; ?>')          
          $("#cmbGrupo").data('kendoComboBox').value(<?php echo $cliente['cod_datos_grupo'] ?>)
          $("#cmbJerarquia").data('kendoComboBox').value(<?php echo $cliente['cod_datos_jerarquia'] ?>)
          $("#cmbNacimiento").data('kendoComboBox').value(<?php echo $cliente['cod_datos_lugar_nac'] ?>)
          $("#dtFechaNac").data('kendoDatePicker').value('<?php echo $cliente['fecha_nac'] ?>')
          $("#txtTelefonoFijo").val('<?php echo $cliente['telefono_fijo'] ?>')
          $("#cmbCargo").data('kendoComboBox').value('<?php echo $cliente['cod_datos_cargo'] ?>')
          $("#cmbGrado").data('kendoComboBox').value('<?php echo $cliente['cod_datos_grado'] ?>')
          $("#txtEspecialidad").val('<?php echo $cliente['especialidad'] ?>')
          $("#txtUnidad").val('<?php echo $cliente['unidad'] ?>')
          $("#dtFechaAscenso").data('kendoDatePicker').value('<?php echo $cliente['fecha_asc'] ?>')
          $("#txtEstatura").val('<?php echo $cliente['estatura'] ?>')
          $("#txtPeso").val('<?php echo $cliente['peso'] ?>')
          $("#cmbCamisa").data('kendoComboBox').value('<?php echo $cliente['cod_datos_camisa'] ?>')
          $("#cmbPantalon").data('kendoComboBox').value('<?php echo $cliente['cod_datos_pantalon'] ?>')
          $("#cmbCalzado").data('kendoComboBox').value('<?php echo $cliente['cod_datos_calzado'] ?>')
          $("#cmbGorra").data('kendoComboBox').value('<?php echo $cliente['cod_datos_gorra'] ?>')
          $("#cmbEstadoCivil").data('kendoComboBox').value('<?php echo $cliente['cod_datos_estado_civil'] ?>')
          $("#txtConyugue").val('<?php echo $cliente['conyuge'] ?>')
          $("#txtPadre").val('<?php echo $cliente['padre'] ?>')
          $("#txtMadre").val('<?php echo $cliente['madre'] ?>')
          $("#txtDireccionEmergencia").val('<?php echo $cliente['direccion_emergencia'] ?>')          
     }

     function onClick() {
          event.preventDefault();
          $('#btnGuardar').data('kendoButton').enable(false);

          $.post("../Clientes/actualizar_datos", {
               cod_cliente: $("#hdnCliente").val(),
               cod_grupo: $("#cmbGrupo").data("kendoComboBox").value(),
               cod_jerarquia: $("#cmbJerarquia").data("kendoComboBox").value(),
               cod_lugar_nac: $("#cmbNacimiento").data("kendoComboBox").value(),
               fecha_nac: formatDate($("#dtFechaNac").data("kendoDatePicker").value()),
               telefono_fijo: $("#txtTelefonoFijo").val(),
               cod_cargo: $("#cmbCargo").data("kendoComboBox").value(),
               cod_grado: $("#cmbGrado").data("kendoComboBox").value(),
               especialidad: $("#txtEspecialidad").val(),
               unidad: $("#txtUnidad").val(),
               fecha_asc: formatDate($("#dtFechaAscenso").data("kendoDatePicker").value()),
               estatura: $("#txtEstatura").val(),
               peso: $("#txtPeso").val(),
               cod_camisa: $("#cmbCamisa").data("kendoComboBox").value(),
               cod_pantalon: $("#cmbPantalon").data("kendoComboBox").value(),
               cod_calzado: $("#cmbCalzado").data("kendoComboBox").value(),
               cod_gorra: $("#cmbGorra").data("kendoComboBox").value(),
               cod_estado_civil: $("#cmbEstadoCivil").data("kendoComboBox").value(),
               conyuge: $("#txtConyugue").val(),
               padre: $("#txtPadre").val(),
               madre: $("#txtMadre").val(),
               direccion_emergencia: $("#txtDireccionEmergencia").val(),
          }).done(function(data) {
               data = $.parseJSON(data);               
               mensaje('Actualizacion', 'Actualizacion completada');
               $('#btnGuardar').data('kendoButton').enable(true);
          });
     }
</script>