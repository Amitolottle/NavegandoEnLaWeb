
// Wstas variables son las que se le entrega a los marcadores y se modifican con lo objetinido por el objeto JSON
var nombres=[];
var latitudes=[];
var longitudes=[];

//FUNCION a cargar cada vez que se agrega algo al canvas, la cual crea un mapa con los atributos entregados
function initialize(r){
	var mapOptions = {
		center: new google.maps.LatLng(3.425675924511549, -76.55270937499995),
		zoom: 13,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"),
		mapOptions);

	var infowindow = new google.maps.InfoWindow();

       //En esta repetitiva evaluo el tamaño de cualquier variable a entregar al marcador
       // ya que todas deberian tener el mismo tamaño, con esto agrego al marcador las variables
       // en las distintas posiciones. También manejo los eventos del click en el marcador.
       for(i = 0;i<nombres.length;i++){
       	var marcador=new google.maps.Marker({
       		position: new google.maps.LatLng(latitudes[i],longitudes[i]),
       		map:map
       	});

       	var infowindow = new google.maps.InfoWindow();

       	google.maps.event.addListener(marcador, 'click', (function(marcador, i) {
            return function() {
              infowindow.setContent(nombres[i]);
              infowindow.open(map, marcador);
            }
          })(marcador, i));

       }
   }


/*Funcion iniciar que se encarga del funcionamiento del drag and drop, llamando a las demas funciones
cuando se accionan los eventos de drag, soltar toma el id del lienzo en donde se pintarán los íconos*/
   function iniciar(){
   	var imagenes=document.querySelectorAll('#cajaImagenes > img');
   	for(var i=0; i<imagenes.length;i++){
   		imagenes[i].addEventListener('dragstart',arrastrado,false);
   		imagenes[i].addEventListener('dragend',finalizado,false)
   	}
   	soltar=document.getElementById('lienzo');
   	lienzo=soltar.getContext('2d');
   	soltar.addEventListener('dragenter',entrando,false);
   	soltar.addEventListener('dragleave',saliendo,false);
   	soltar.addEventListener('dragover',function(e){
   		e.preventDefault();},false);

   	soltar.addEventListener('drop', soltado, false);
   }


   /*Evento accionado sobre el lienzo y que sucede una vez entra un elemento en el area del canvas, se le cambia el color al lienzo
   para darle un feedback al usuario  y se oculta el texto que estaba sobre el lienzo */
   function entrando(e){
   	e.preventDefault();
   	soltar.style.background='rgba(0,150,0,.2)';
   	var texto=document.getElementById('texto');
   	texto.style.visibility='hidden';
   }

   /*Evento para que el lienzo vuelva a su estado normal*/
   function saliendo(e){
   	e.preventDefault();
   	soltar.style.background='#FFFFFF';
    var texto=document.getElementById('texto');
    texto.style.visibility='visible';
   }

   /*Evento que se acciona cuando se suelta el elemento en cualquier lugar, esta función cambia
   la visibilidad del elemento en la caja a oculto*/
   function finalizado(e){
   	elemento=e.target;
   	elemento.style.visibility='hidden';
   }

   /*Evento que se encarga de transmitir la información de la imagen que se arrastró a la ubicación
   del cursor*/
   function arrastrado(e){
   	elemento=e.target;
   	e.dataTransfer.setData('Text',elemento.getAttribute('id'));
   	e.dataTransfer.setDragImage(e.target,62,62);
   }

   /*Evento que se acciona cuando se suelta el elemento, este se encarga de pasar la información de la imagen que se estaba arrastrando
   para poder dibujarla en el canvas*/
	function soltado(e){
		e.preventDefault();
		var id=e.dataTransfer.getData('Text');
		var elemento=document.getElementById(id);
		console.log(id);
		var posX=e.pageX-soltar.offsetLeft;
		var posY=e.pageY-soltar.offsetTop;
		lienzo.drawImage(elemento,posX-100,posY-100);

		//Envio por post la informacion del id del elemento que estoy arrastrando llamado marcador.
		$.ajax({
			type: "POST",
			url: "includes/api/mostrarMarcadores.php",
			data: { marcador: id }
		}).done(function(){
			console.log("Solicitud enviada al API");

			// En esta funcion, si se completó la solicitud, le hago parse al resultado JSON, para tener
			// un objeto. Luego, hago una repetitiva de los elementos de este objeto arreglo. Para así,
			// asignarle a las variables que van en el marcador los distintos elementos, que son nombre,
			// latitud y longitud. Al final vuelvo a llamar la función que pinta el mapa y marcadores
		}).success(function(result){
			console.log("Resultado: "+result);
			var conca=JSON.parse(result);
			console.log("ARREGLO: "+conca.temps.length);
			for(i=0;i<conca.temps.length;i++){
				nombres[i]=conca.temps[i].nom;
				latitudes[i]=conca.temps[i].lat;
				longitudes[i]=conca.temps[i].lon;
			}
			initialize();
		}).error(function(error){
			console.log("Error: "+ error);
		})
		
	}

  /*El botón se encarga de refrescar la pantalla*/
  document.getElementById("boton").click(function( event ) {
    console.log("funciona")
    location.reload(false);
  });

	window.addEventListener('load',iniciar,false);



