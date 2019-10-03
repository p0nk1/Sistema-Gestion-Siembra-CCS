<?php

	 /*ob_start();

	 include(dirname(__FILE__).'/reporte.html.php');

     $content = ob_get_clean();



	 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
         try{
             $html2pdf = new HTML2PDF('P', 'Letter', 'es');
             $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
             $html2pdf->Output('reporte_'.date("d-m-Y").'.pdf');
         }
         catch(HTML2PDF_exception $e) {
             echo $e;
             exit;
         }*/
    // get the HTML     
    ob_start();
    include(dirname(__FILE__).'/reporte.html.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'Letter', 'es');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('reporte_'.date("d-m-Y").'.pdf');
        //$html2pdf->Output('exemple01.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
