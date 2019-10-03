
            $("#cadena").jCombo("../ajax/cadena.php", { selected_value : '' } );

            $("#area_cadena").jCombo("../ajax/area.php?id=", { 
                                         parent: "#cadena"
                 
            });
                                
                                
            $("#tipo_org").jCombo("../ajax/tipo_org.php", { selected_value : '' } );

            $("#organizacion").jCombo("../ajax/organizacion.php?id=", { 
                                        parent: "#tipo_org"
             
            });                            

		
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

	     $("#est_fin").jCombo("../ajax/estatus_financiamiento.php", { selected_value : '' } );
				  
	     $("#ente_fin").jCombo("../ajax/ente_financiamiento.php", { selected_value : '' } );
		

		 $("#est_fin_adicional").jCombo("../ajax/estatus_financiamiento.php", { selected_value : '' } );
				  
	     $("#ente_fin_adicional").jCombo("../ajax/ente_financiamiento.php", { selected_value : '' } );

			     $("#est_fin2").jCombo("../ajax/estatus_financiamiento.php", { selected_value : '' } );
				  
	     $("#ente_fin2").jCombo("../ajax/ente_financiamiento.php", { selected_value : '' } );

