<?php
        try{
    ob_start();
    include(dirname(__FILE__).'/ficha_tecnica_html.php');
    $content = ob_get_clean();

    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
            $html2pdf = new HTML2PDF('P', 'Letter', 'fr');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('ficha_'.date("d-m-Y").'.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
?>
