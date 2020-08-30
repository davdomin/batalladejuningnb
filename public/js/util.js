const C_SEXO = 1;
const C_GRUPO_SANGUINEO = 2;
const C_BANCO = 3;
const C_ESTADO_DEPOSITO = 4;

function getDataSource(cod_clasificacion) {

        var dataSource = new kendo.data.DataSource({
                transport: {
                    read: {                    
                        url: "../Home/getDataSource",
                        dataType: "json",
                        type: "POST",
                        data: {cod_clasificacion: cod_clasificacion}
                    }               
                },               
            });       
    
    return dataSource;    
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}