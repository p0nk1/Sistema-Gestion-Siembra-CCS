                          

		
            $("#estado").jCombo("../ajax/estados.php", { selected_value : '6' } );

            $("#municipio").jCombo("../ajax/municipio.php?id=", { 
					parent: "#estado", 
					parent_value: '6', 
					selected_value: '104'
				});


            $("#circuito").jCombo("../ajax/circuito.php?id=", { 
					parent: '#municipio' 
				});		

            $("#parroquia").jCombo("../ajax/parroquia.php?id=", { 
					parent: "#circuito" 
				
				});

            $("#eje_parroquial").jCombo("../ajax/eje_parroquial.php?id=", { 
					parent: "#parroquia"
				 
				}); 

