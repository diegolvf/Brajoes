  // vinculando seus pais e estados e adicionando seus estados correspondentes
  const statesByCountry = {

    BR: ["Acre", "Alagoas", "Amapá", "Amazonas", "Bahia", "Ceará", "Distrito Federal", "Espírito Santo", "Goiás", "Maranhão", "Mato Grosso", "Mato Grosso do Sul", "Minas Gerais", "Pará", "Paraíba", "Paraná", "Pernambuco", "Piauí", "Rio de Janeiro", "Rio Grande do Norte", "Rio Grande do Sul", "Rondônia", "Roraima", "Santa Catarina", "São Paulo", "Sergipe", "Tocantins"]
    , AR: ["Buenos Aires", "Córdoba", "Santa Fe", "Mendoza", "Tucumán", "Entre Ríos", "Salta", "Chaco", "Corrientes", "Santiago del Estero", "Jujuy", "San Juan", "Misiones", "Formosa", "Neuquén", "La Rioja", "San Luis", "Catamarca", "La Pampa", "Chubut", "Tierra del Fuego"]
    , BO: ["Santa Cruz", "La Paz", "Cochabamba", "Beni", "Oruro", "Potosí", "Tarija", "Chuquisaca", "Pando"], 
    CL: ["Arica y Parinacota", "Tarapacá", "Antofagasta", "Atacama", "Coquimbo", "Valparaíso", "Región del Libertador General Bernardo O'Higgins", "Maule", "Biobío", "La Araucanía", "Los Ríos", "Los Lagos", "Aisén del General Carlos Ibáñez del Campo", "Magallanes y de la Antártica Chilena", "Región Metropolitana de Santiago"]
    ,  CO: ["Amazonas", "Antioquia", "Arauca", "Atlántico", "Bolívar", "Boyacá", "Caldas", "Caquetá", "Casanare", "Cauca", "Cesar", "Chocó", "Córdoba", "Cundinamarca", "Guainía", "Guaviare", "Huila", "La Guajira", "Magdalena", "Meta", "Nariño", "Norte de Santander", "Putumayo", "Quindío", "Risaralda", "San Andrés y Providencia", "Santander", "Sucre", "Tolima", "Valle del Cauca", "Vaupés", "Vichada"]
    , EC: ["Azuay", "Bolívar", "Cañar", "Carchi", "Chimborazo", "Cotopaxi", "El Oro", "Esmeraldas", "Galápagos", "Guayas", "Imbabura", "Loja", "Los Ríos", "Manabí", "Morona Santiago", "Napo", "Orellana", "Pastaza", "Pichincha", "Santa Elena", "Santo Domingo de los Tsáchilas", "Sucumbíos", "Tungurahua", "Zamora Chinchipe"]
    , GY: ["Barima-Waini", "Cuyuni-Mazaruni", "Demerara-Mahaica", "East Berbice-Corentyne", "Essequibo Islands-West Demerara", "Mahaica-Berbice", "Pomeroon-Supenaam", "Potaro-Siparuni", "Upper Demerara-Berbice", "Upper Takutu-Upper Essequibo"]
    ,  PY: ["Concepción", "San Pedro", "Cordillera", "Guairá", "Caaguazú", "Caazapá", "Itapúa", "Misiones", "Paraguarí", "Alto Paraná", "Central", "Ñeembucú", "Amambay", "Canindeyú", "Presidente Hayes", "Boquerón", "Alto Paraguay"]
    ,  PE: ["Amazonas", "Áncash", "Apurímac", "Arequipa", "Ayacucho", "Cajamarca", "Callao", "Cusco", "Huancavelica", "Huánuco", "Ica", "Junín", "La Libertad", "Lambayeque", "Lima", "Loreto", "Madre de Dios", "Moquegua", "Pasco", "Piura", "Puno", "San Martín", "Tacna", "Tumbes", "Ucayali"]
    , SR: ["Brokopondo", "Commewijne", "Coronie", "Marowijne", "Nickerie", "Para", "Paramaribo", "Saramacca", "Sipaliwini", "Wanica"]
    , UY: ["Artigas", "Canelones", "Cerro Largo", "Colonia", "Durazno", "Flores", "Florida", "Lavalleja", "Maldonado", "Montevideo", "Paysandú", "Río Negro", "Rivera", "Rocha", "Salto", "San José", "Soriano", "Tacuarembó", "Treinta y Tres"]
    , VE: ["Amazonas", "Anzoátegui", "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo", "Cojedes", "Delta Amacuro", "Falcón", "Guárico", "Lara", "Mérida", "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre", "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia", "Distrito Capital", "Dependências Federais"]
    
    
    };
    
    
    function populateStates(country) {
    const stateSelect = document.getElementById('state');
    stateSelect.innerHTML = '<option value="">Selecione o estado</option>';
    if (country === '') return;
    statesByCountry[country].forEach((state) => {
        const option = document.createElement('option');
        option.value = state;
        option.text = state;
        stateSelect.appendChild(option);
    });
    }


    //codigo js para a area do administrador 
    function toggleMemberList() {
      var memberList = document.getElementById("memberList");
      var filterBox = document.getElementById("filterBox");
      if (memberList.style.display === "none") {
          memberList.style.display = "block";
          filterBox.style.display = "block";
      } else {
          memberList.style.display = "none";
          filterBox.style.display = "none";
      }
  }

  function copyEmails() {
      var emailList = "";
      var emails = document.getElementsByClassName("member-email");
      for (var i = 0; i < emails.length; i++) {
          emailList += emails[i].innerText + "; ";
      }
      navigator.clipboard.writeText(emailList);
      alert("Lista de emails copiada para a área de transferência: " + emailList);
  }

  function copySelectedEmails() {
      var emailList = "";
      var checkboxes = document.querySelectorAll('.member-checkbox:checked');
      checkboxes.forEach(function (checkbox) {
          var email = checkbox.parentNode.querySelector('.member-email').innerText;
          emailList += email + "; ";
      });
      navigator.clipboard.writeText(emailList);
      alert("Lista de emails selecionados copiada para a área de transferência: " + emailList);
  }

  function filterMembers() {
      var input, filter, members, member, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      members = document.getElementsByClassName('member-item');

      for (var i = 0; i < members.length; i++) {
          member = members[i].getElementsByClassName('member-name')[0];
          txtValue = member.textContent || member.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              members[i].style.display = "";
          } else {
              members[i].style.display = "none";
          }
      }
  }