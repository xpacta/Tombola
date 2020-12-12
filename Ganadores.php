<header>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@1.3.6/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@5.2.0/dist/js/tableexport.min.js"></script>
</header>

<body >

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Ganadores</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" type="button" onclick="exportToExcel()" id="btnexportar" ><img src="iconex.png" width="30px" height="30px">Exportar</img></a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search"  id="filtro" placeholder="Buscar" onKeyUP='buscar()' aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar()" type="button">Buscar</button>
    </div>
  </div>
</nav>
<div class = "container" style="margin-top:80px">
<div class = "row">
<table class="table table-striped" border="0" id="myTable">
<thead>
  
  <tr>
    <th>#</th>
      
    <th>Nomina</th>

    <th>Nombre</th>

    <th>Premio</th>

  </tr>
  </thead>
  <tbody id="insertData"></tbody>

    </table>
</div>
</div>
</body>
<script>
function exportToExcel(){
  var table="myTable";
  var filename= "Ganadores";
 let uri = 'data:application/vnd.ms-excel;base64,',
                            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><title></title><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=utf-8_spanish_ci"/></head><body><table>{table}</table></body></html>',
                            base64 = function(s) { return window.btoa(decodeURIComponent(encodeURIComponent(s))) }, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; })}
                    
                    if (!table.nodeType){ 
                        table = document.getElementById(table);
                        
                        var table3= table.innerHTML;
                    }
                            var ctx = {worksheet: "trinomio" || 'Worksheet', table: table3}       
                    var link = document.createElement('a');
                    link.download = filename;
                    link.href = uri + base64(format(template, ctx));
                link.click();
}

function buscar(){
    var value = $("#filtro").val().toLowerCase();
    var valido=0;
    $("#insertData tr").filter(function() {
      $(this).removeClass("table-dark");
      var validate= $(this).text().toLowerCase().indexOf(value) > -1;
      if(validate){
        $(this).addClass("table-dark");
        $(this).attr("tabindex",1);
        $(this).focus(); 
        valido =1; 
      }
    });
    if(valido===0)alert("No encontrado");
    document.getElementById("filtro").focus();
}
CargarDatos();
setInterval('CargarDatos()',10000);
let array=[];
let tempArray=[];
let extractArray=[];
function CargarDatos(){
 var data = {
		Id: "Nada"
        };
	$.ajax({
		method: "GET",
		url: "CargarGanadores.php",
        data: {
			datos: JSON.stringify(data)
         },
        dataType: "json",
        contentType: "application/json",
        success: function (resp) {
			if (resp) {
				//console.log(resp);
				tempArray = resp;
				if(array.length === 0){
					console.log("Carga por primera vez");
					array = resp;
					for(var i = 0; i <= resp.length; i++ ){
					document.getElementById("insertData").innerHTML += "<tr><td>"+ resp[i].Numero +"</td><td>"+ resp[i].Nomina +"</td><td>"+ resp[i].Nombre +"</td><td>"+ resp[i].Premio +"</td></tr>";
					}
				}else{
					console.log(tempArray.length);
					console.log(array.length);
					tempArray.sort();
					array.sort();
					if(tempArray.length === array.length){
						console.log("Son iguales");
						console.log("Sin cambios.");
					}else{
						console.log("No son iguales");
						console.log("hay cambios");
						var dif = tempArray.length - array.length;
						var CargadosActualmente = array.length;
						console.log(dif);
						console.log(CargadosActualmente);
						extractArray=[];
						for(var i = 0; i <= array.length; i++ ){
							if(tempArray[i].Nomina != array[i].Nomina){
									extractArray.push(tempArray[i]);
									console.log("Encontro la diferencia..");
									console.log(extractArray);
									break;
								}else{
									if(i == array.length){
											console.log("la ultima posicion es la diferencia");
											extractArray.push(tempArray[i+1]);
										}
									}
								}
						array = tempArray;
						document.getElementById("insertData").innerHTML += "<tr><th>"+ (CargadosActualmente + 1) +"</th><th>"+ extractArray[0].Nomina +"</th><th>"+ extractArray[0].Nombre +"</th><th>"+ extractArray[0].Premio +"</th></tr>";
					}
				}
            }
         }
    });
}

</script>