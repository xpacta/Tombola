<header>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script></header>
<body >

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class = "container" style="margin-top:80px">
<div class = "row">
<table class="table table-striped" border="0" id="insertData">

  <tr>
    <th>#</th>
      
    <th>Nomina</th>

    <th>Nombre</th>

    <th>Premio</th>

  </tr>

      
    
    

    </table>
</div>
</div>
</body>
<script>
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
					document.getElementById("insertData").innerHTML += "<tr><th>"+ resp[i].Numero +"</th><th>"+ resp[i].Nomina +"</th><th>"+ resp[i].Nombre +"</th><th>"+ resp[i].Premio +"</th></tr>";
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