<?php 
  require ("fpdf/fpdf.php");

  
  //customer and invoice details
  $info=[
    "enom"=>"",
    "address"=>"",
    "ecodep"=>"",
    "city"=>"",
    "invoice_no"=>"62778",
    "invoice_date"=>"30-11-2021",
    "total_amt"=>"5200.00",
    "words"=>"Rupees Five Thousand Two Hundred Only",
    "logo"=>"",
  ];

  $con=mysqli_connect("localhost","root","root","devisbuilder");
  $sql="SELECT * FROM nv_devis WHERE id='{$_GET["id"]}'";
  $res=$con->query($sql);
  if($res->num_rows>0){
    $row=$res->fetch_assoc();
    $info=[
      "ndevis"=>$row["id"],
      "emi_date"=>$row["dateemi"],
      "enom"=>$row["enom"],
      "address"=>$row["eadress"],
      "ecodep"=>$row["ecodep"],
      "city"=>$row["eville"],
      "pays"=>$row["epays"],
      "email"=>$row["eemail"],
      "tele"=>$row["eteleph"],
      "invoice_no"=>"62778",
      "invoice_date"=>"30-11-2021",
      "total_amt"=>"5200.00",
      "words"=>"Rupees Five Thousand Two Hundred Only",
      "logo"=>$row["logo"],
    ];
  }

  $client=[
    "prenom"=>"",
    "nom"=>"",
    "adresse"=>"",
    "codep"=>"",
    "ville"=>"",
    "pays"=>"",
    "telephone"=>"",
    "email"=>"",
  ];

  $sql="SELECT * FROM client WHERE id='{$_GET["id"]}'";
  $res=$con->query($sql);
  if($res->num_rows>0){
    $row=$res->fetch_assoc();
    $client=[
      "prenom"=>$row["prenom"],
      "nom"=>$row["nom"],
      "adresse"=>$row["adresse"],
      "codep"=>$row["codep"],
      "ville"=>$row["ville"],
      "pays"=>$row["pays"],
      "telephone"=>$row["telephone"],
      "email"=>$row["email"],
    ];
  }

  
  //invoice Products
  $products_info = [];
  $sql = "SELECT * FROM tableau WHERE id='{$_GET["id"]}'";
  $res = $con->query($sql);
  if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
      $products_info[] = [
        "profil" => utf8_decode($row["profil"]),
        "taux" => $row["taux"],
        "charge" => $row["day_difference"],
        "cout" => ""
      ];
    }
  }

  // periodes
  $periodes=[];
  $sql="SELECT * FROM periodes WHERE id='{$_GET["id"]}'";
  $res=$con->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()) {
      $periodes[]=[
        "coeff"=>$row["coeff"],
      ];
    }
  }
  
  class PDF extends FPDF
  {
    function Header(){

    }
    
    function body($info,$client,$periodes,$products_info){

      //Display CLIENT LOGO text
      $this->SetY(15);
      $this->SetFont('Arial','B',18);
      if (!empty($info["logo"])) {
        $imageData = $info["logo"];
        $this->Image($imageData, 20, 20, 50, );
      }
      // $this->Cell(50,10,$info["logo"],0,1);
      

      //Display CLIENT LOGO text
      $this->SetY(20);
      $this->SetX(-80);
      $this->SetFont('Arial','B',14);
      $this->Cell(30,10,"Devis N:",0,0);
      $this->Cell(50,10,$info["ndevis"],0,1);
      $this->SetFont('Arial','',15);
      $this->SetX(-80);
      $this->Cell(42,4,utf8_decode("Date d'émission:"),0,0);
      $this->Cell(50,4,$info["emi_date"],0,1);
      
      $this->SetY(75);
      $this->SetX(20);
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,$info["enom"],0,1);
      $this->SetFont('Arial','',15);
      $this->SetX(20);
      $this->Cell(50,7,$info["address"],0,1);
      $this->SetX(20);
      $this->Cell(30,7,$info["city"],0,0);
      $this->SetX(50);
      $this->Cell(50,7,$info["ecodep"],0,1);
      $this->SetX(20);
      $this->Cell(50,7,$info["pays"],0,1);
      $this->SetX(20);
      $this->Cell(50,7,$info["email"],0,1);
      $this->SetX(20);
      $this->Cell(50,7,$info["tele"],0,1);

      //Display Invoice no
      $this->SetY(75);
      $this->SetX(-90);
      $this->SetFont('Arial','B',14);
      $this->Cell(20,10,$client["prenom"],0,0);
      $this->Cell(50,10,$client["nom"],0,1);
      $this->SetX(-90);
      $this->SetFont('Arial','',15);
      $this->Cell(50,7,$client["adresse"],0,1);
      $this->SetX(-90);
      $this->Cell(30,7,$client["ville"],0,0);
      $this->Cell(50,7,$client["codep"],0,1);
      $this->SetX(-90);
      $this->Cell(50,7,$client["pays"],0,1);
      $this->SetX(-90);
      $this->Cell(50,7,$client["email"],0,1);
      $this->SetX(-90);
      $this->Cell(50,7,$client["telephone"],0,1);
      
      //Display Table headings
      $this->SetY(160);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"PROFIL",1,0);
      $this->Cell(65,9,"TAUX JOURNALIER",1,0,"C");
      $this->Cell(40,9,"COEFFICIENT",1,0,"C");
      $this->Cell(45,9,"CHARGE (JH)",1,0,"C");
      $this->Cell(45,9,"COUT (MAD)",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //Display table product rows
      foreach($products_info as $key => $product_row) {
        $periode_row = $periodes[$key];
        $product = $product_row["taux"] * $periode_row["coeff"] * $product_row["charge"];
        $this->Cell(80,9,utf8_decode($product_row["profil"]),"LR",0);
        $this->Cell(65,9,utf8_decode($product_row["taux"]),"R",0,"C");
        $this->Cell(40,9,$periode_row["coeff"],"R",0,"C");
        $this->Cell(45,9,$product_row["charge"],"R",0,"C");
        $this->Cell(45,9,$product,"R",1,"C");
      }
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(80,9,"","LR",0);
        $this->Cell(65,9,"","R",0,"R");
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(45,9,"","R",0,"C");
        $this->Cell(45,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(230,9,"Montant TOTAL HT",1,0,"R");
      $this->Cell(45,9,$product,1,0,"C");
      $this->Cell(-0.1,9," MAD",1,1,"R");
      $this->Cell(230,9,"TVA (20%)",1,0,"R");
      $this->Cell(45,9,$product * 20 / 100,1,0,"C");
      $this->Cell(-0.1,9," MAD",1,1,"R");
      $this->Cell(230,9,"Montant TTC",1,0,"R");
      $this->Cell(45,9,$product + $product * 20 / 100,1,0,"C");
      $this->Cell(-0.1,9," MAD",1,1,"R");
      
      
    }
    function Footer(){
      
      //set footer position
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->SetY(-45);
      $this->SetX(-60);
      $this->Cell(0,10,"Authorized Signature",0,1,"");
      $this->SetFont('Arial','',10);
      
    //   //Display Footer Text
    //   $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      
    }
    
  }
  //Create A3 Page with Portrait 
  $pdf=new PDF("P","mm","A3");
  $pdf->AddPage();
  $pdf->body($info,$client,$periodes,$products_info);
  $pdf->Output();
?>