<?php
	session_start();
	include_once ("../funciones/funciones_session.php");
	include_once ("../conexion/conexionpg.php");
	include_once ("../funciones/queryProyectos.php");
	include_once ("../funciones/funciones.php");
	comprobarSession($_SESSION['adminProy']);
	extract($_POST);
	extract($_GET);

	$datproyec=buscar_proyectos_asignados();
?>
<HTML>
	<script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="busquedas.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <LINK REL="SHORTCUT ICON" HREF="../imagenes/log32t.png">
        <link rel="stylesheet" href="../css/css.css" type="text/css" />
        <!--    <link rel="stylesheet" href="../css/css1.css" type="text/css" />-->
        <!-- lytebox v3.22 -->
        <link href="mod_usuarios/lytebox_v3.22/lytebox.css" rel="stylesheet" type="text/css"  media="screen"/>
        <script type="text/javascript" language="javascript" src="mod_usuarios/lytebox_v3.22/lytebox.js"></script>
    
        <script type="application/x-javascript" src="../js/general.js"></script>
        <script type="text/javascript" language="javascript" src="js/general.js"></script>
        <script type="application/x-javascript" src="../js/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <link type="text/css" href="../css/smoothness/jquery-ui-1.8.15.custom.css" rel="stylesheet" />
        <style type="text/css" media="screen">
            @import "../css/site_jui.ccss";
            @import "../css/demo_table_jui.css";
            .dataTables_info { padding-top: 0; }
            .dataTables_paginate { padding-top: 0; }
            .css_right { float: right; }
            #example_wrapper .fg-toolbar { font-size: 0.8em }
            #theme_links span { float: left; padding: 2px 10px; }
        </style>
        <script type="text/javascript">
            function fnFeaturesInit ()
            {
                /* Not particularly modular this - but does nicely :-) */
                $('ul.limit_length>li').each( function(i) {
                    if ( i > 9 ) {
                        this.style.display = 'none';
                    }
                });
                $('ul.limit_length').append( '<li class="css_link">Show more<\/li>' );
                $('ul.limit_length li.css_link').click( function (){
                    $('ul.limit_length li').each( function(i){
                        if ( i > 5 ){
                            this.style.display = 'list-item';
                        }
                    });
                    $('ul.limit_length li.css_link').css( 'display', 'none' );
                });
            }
            $(document).ready( function()
            {
                fnFeaturesInit();
                $('#example').dataTable
                ({
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "oLanguage":
                        {
                        "sProcessing": '<span class="texto_negro_no_size">Procesando...</span>',
                        "sLengthMenu": '<span class="texto_negro_no_size">Mostrar _MENU_ Proyectos por P&aacute;gina</span>',
                        "sSearch": '<span class="texto_negro_no_size">Filtrar Ordenes:</span>',
                        "sEmptyTable": '<span class="texto_negro">No hay datos disponibles</span>',
                        "sZeroRecords": '<span class="texto_negro">No se han encontrado registros coincidentes</span>',
                        "sInfo": '<span class="texto_negro">Mostrando del _START_ al _END_ de _TOTAL_ Proyecto(s)</span>',
                        "sInfoEmpty": '<span class="texto_negro">Mostrando del 0 al 0 de 0 Proyectos</span>',
                        "sInfoFiltered": '<span class="texto_negro">(filtrado de _MAX_ Proyectos)</span>',
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sPrevious": "Anterior",
                            "sNext":     "Siguiente",
                            "sLast":     "Ultimo",
                        },
                    },
                    "aaSorting": [[ 0, "asc"]],
                    "aLengthMenu": [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, 'Todo' ]],
                });
            });
        </script>    
	<script language="JavaScript">
		function lanzarSubmenu(ventana){
			ventana_secundaria = window.open(ventana,"_blank","width=500,height=300,scrollbars=NO")
			ventana_secundaria.moveTo(400,300);
		}
	</script>
	<BODY>
		<BR>
		<TABLE id="tablaTitulo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR><TD class="tituloBackground">  PROYECTOS ASIGNADOS </TD></TR>
		</TABLE>
		<BR>
		<TABLE id="tablaCuerpo" border="0" cellpadding="0" cellspacing="0" align="center" width="90%">
			<TR>
				<TD>
				<TABLE cellpadding="0" cellspacing="0" border="0"  id="example" style="width:100%"  class="display">
					<THEAD>
						<TR style="width:100%" class="titulo_tabla">
							<TH class="tituloForm" width="5%">N&deg;</TH>
							<TH class="tituloForm" width="50%">Nombre del Proyecto</TH>
							<TH class="tituloForm" width="30%">Responsable</TH>
							<TH class="tituloForm" width="10">Cambiar Resp.</TH>
						</TR>
					</THEAD>
					<TBODY>
					<!-- ******************************************************************************************************************* -->
					<?php if(!empty($datproyec)){
						$a=0;
						foreach ($datproyec['id'] as $value) {
							if($value!=''){
								$resp_proy=buscar_responsables_proyecto($datproyec['id'][$a]);
					?>
					<TR class="gradeX">
						<TD class="textoCampo" align="center" width="5%"><a><?php echo $datproyec['id'][$a]?></a></TD>
						<TD class="textoCampo"><a><?php echo $datproyec['np'][$a]?></a></TD>
						<TD class="textoCampo" align="center">
							<?php
								$b=0;
								foreach ($resp_proy['iu'] as $valueb) {
									$max=count($resp_proy['iu']);
									if($value!=''){ 
										echo $resp=nombres_responsables($resp_proy['iu'][$b]);
										if($max!=$b+1){ echo '&nbsp;'; }
										$b++;
									}
								}
							?>
						</TD>
						<TD class="textoCampo" align="center">
							<a href="#" class="link" onClick="lanzarSubmenu('cambiarResponsable.php?id=<?php echo $datproyec['id'][$a]?>')"><img src="../imagenes/edit_profile.png" border="0"></a>
						</TD>
					</TR>
					<?php $a++; } } } ?>
					</TBODY>
				</TABLE>
				</TD>
			</TR>
		</TABLE>
	</BODY>
</HTML>
