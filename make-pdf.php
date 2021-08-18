<?php
function data($mulai, $sampai)
{

    $host = 'localhost';
    $nama = 'root';
    $pass = '';
    $db = 'keuangan';

    $koneksi = mysqli_connect($host, $nama, $pass, $db);

    $query = mysqli_query($koneksi, "SELECT SUM(uang_pendafaftaran_baru) AS total1, SUM(uang_sewa_lemari) AS total2, SUM(uang_seragam_pondok) AS total3, SUM(uang_pembangunan) AS total4, SUM(uang_ujian) AS total5 FROM pendaftaran_baru WHERE tanggal_pembayaran between '$mulai' and '$sampai'");
    $query = mysqli_query($koneksi, "SELECT * from pendaftaran_baru");
    $total1 = 0;
    $total2 = 0;
    $total3 = 0;
    $total4 = 0;
    $total5 = 0;
    $totalmasuk = 0;
    var_dump($mulai);
    var_dump($sampai);
    while ($row = mysqli_fetch_array($query)) {

        $total1 += $row['total1'];
        $total2 += $row['total2'];
        $total3 += $row['total3'];
        $total4 += $row['total4'];
        $total5 += $row['total5'];
        $totalmasuk = $total1 + $total2 + $total3 + $total4 + $total5;
   
    $data = [
        'total1' => $total1,
        'total2' => $total2,
        'total3' => $total3,
        'total4' => $total4,
        'total5' => $total5,
        'totalMasuk' => $totalmasuk
    ]; }

    $output = '<tr>  
                    <td>Uang Pendaftaran Baru</td> 
                    <td>' . $total1 . '</td> 
                </tr>  
                <tr>  
                    <td>Uang Sewa Lemari</td> 
                    <td>' . $total2 . '</td> 
                </tr> 
                <tr>  
                    <td>Uang Seragam Pondok</td> 
                    <td>' . $total3 . '</td> 
                </tr> 
                <tr>  
                    <td>Uang Pembangunan</td> 
                    <td>' . $total4 . '</td> 
                </tr> 
                <tr>  
                    <td>Uang Ujian</td> 
                    <td>' . $total5 . '</td> 
                </tr> 
                <tr>  
                    <td> </td> 
                    <td>' . $totalmasuk . '</td> 
                </tr> 
                    ';
    return $output;
}

if (isset($_POST["create_pdf"])) {
    require_once('library/tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Export HTML Table ");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '  
     <h3 align="center">Export HTML Table </h3><br /><br />  
     <table border="1" cellspacing="0" cellpadding="5">  
          <tr>  
               <th width="50%">Jenis</th>  
               <th width="50%">Total</th>  
          </tr>  
     ';
    $content .= data($_POST["mulai"], $_POST["sampai"]);
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('test.pdf', 'I');
}