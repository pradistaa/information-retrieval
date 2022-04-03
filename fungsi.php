<?php

function preproses($teks) {

    require_once __DIR__ . '/vendor/autoload.php';

    //1. ubah ke huruf kecil dan hilangkan tanda baca (Normalisasi)   
        $teks = strtolower(trim($teks));
        
        $teks = str_replace("'", " ", $teks);
        $teks = str_replace("-", " ", $teks);
        $teks = str_replace(")", " ", $teks);
        $teks = str_replace("(", " ", $teks);
        $teks = str_replace("\"", " ", $teks);
        $teks = str_replace("/", " ", $teks);
        $teks = str_replace("=", " ", $teks);
        $teks = str_replace(".", " ", $teks);
        $teks = str_replace(",", " ", $teks);
        $teks = str_replace(":", " ", $teks);
        $teks = str_replace(";", " ", $teks);
        $teks = str_replace("!", " ", $teks);
        $teks = str_replace("?", " ", $teks);
        $teks = str_replace("<", " ", $teks);
		$teks = str_replace(">", " ", $teks);
        $teks = preg_replace('/[0-9]+/', '', $teks);	

    //2. Terapkan Stopword Removal
        $stopwords = array("ajak", "akan", "beliau", "khan", "lah", "dong", "ahh", "sob", "elo", "so", "kena", "kenapa", "yang", "dan", "tidak", "agak", "kata", "bilang", "sejak", "kagak", "cukup", "jua", "cuma", "hanya", "karena", "oleh", "lain", "setiap", "untuk", "dari", "dapat", "dapet", "sudah", "udah", "selesai", "punya", "belum", "boleh", "gue", "gua", "aku", "kamu", "dia", "mereka", "kami", "kita", "jika", "bila", "kalo", "kalau", "dalam", "nya", "atau", "seperti", "mungkin", "sering", "kerap", "acap", "harus", "banyak", "doang", "kemudian", "nyala", "mati", "milik", "juga", "mau", "dimana", "apa", "kapan", "kemana", "selama", "siapa", "mengapa", "dengan", "kalian", "bakal", "bakalan", "tentang", "setelah", "hadap", "semua", "hampir", "antara", "sebuah", "apapun", "sebagai", "di", "tapi", "lainnya", "bagaimana", "namun", "tetapi", "biar", "pun", "itu", "ini", "suka", "paling", "mari", "ayo", "barangkali", "mudah", "kali", "sangat", "banget", "disana", "disini", "terlalu", "lalu", "terus", "trus", "sungguh", "telah", "mana", "apanya", "ada", "adanya", "adalah", "adapun", "agaknya", "agar", "akankah", "akhirnya", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "diantaranya", "antaranya", "diantara", "apaan", "apabila", "apakah", "apalagi", "apatah", "ataukah", "ataupun", "bagai", "bagaikan", "sebagainya", "bagaimanapun", "sebagaimana", "bagaimanakah", "bagi", "bahkan", "bahwa", "bahwasanya", "sebaliknya", "sebanyak", "beberapa", "seberapa", "begini", "beginian", "beginikah", "beginilah", "sebegini", "begitu", "begitukah", "begitulah", "begitupun", "sebegitu", "belumlah", "sebelum", "sebelumnya", "sebenarnya", "berapa", "berapakah", "berapalah", "berapapun", "betulkah", "sebetulnya", "biasa", "biasanya", "bilakah", "bisa", "bisakah", "sebisanya", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "percuma", "dahulu", "daripada", "dekat", "demi", "demikian", "demikianlah", "sedemikian", "depan", "dialah", "dini", "diri", "dirinya", "terdiri", "dulu", "enggak", "enggaknya", "entah", "entahlah", "terhadap", "terhadapnya", "hal", "hanyalah", "haruslah", "harusnya", "seharusnya", "hendak", "hendaklah", "hendaknya", "hingga", "sehingga", "ia", "ialah", "ibarat", "ingin", "inginkah", "inginkan", "inikah", "inilah", "itukah", "itulah", "jangan", "jangankan", "janganlah", "jikalau", "justru", "kala", "kalaulah", "kalaupun", "kamilah", "kamulah", "kan", "kau", "kapankah", "kapanpun", "dikarenakan", "karenanya", "ke", "kecil", "kepada", "kepadanya", "ketika", "seketika", "khususnya", "kini", "kinilah", "kiranya", "sekiranya", "kitalah", "kok", "lagi", "lagian", "selagi", "melainkan", "selaku", "melalui", "lama", "lamanya", "selamanya", "lebih", "terlebih", "bermacam", "macam", "semacam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "manakala", "manalagi", "masih", "masihkah", "semasih", "masing", "maupun", "semaunya", "memang", "merekalah", "meski", "meskipun", "semula", "mungkinkah", "nah", "nanti", "nantinya", "nyaris", "olehnya", "seorang", "seseorang", "pada", "padanya", "padahal", "sepanjang", "pantas", "sepantasnya", "sepantasnyalah", "para", "pasti", "pastilah", "per", "pernah", "pula", "merupakan", "rupanya", "serupa", "saat", "saatnya", "sesaat", "aja", "saja", "sajalah", "saling", "bersama", "sama", "sesama", "sambil", "sampai", "sana", "sangatlah", "saya", "sayalah", "se", "sebab", "sebabnya", "tersebut", "tersebutlah", "sedang", "sedangkan", "sedikit", "sedikitnya", "segala", "segalanya", "segera", "sesegera", "sejenak", "sekali", "sekalian", "sekalipun", "sesekali", "sekaligus", "sekarang", "sekitar", "sekitarnya", "sela", "selain", "selalu", "seluruh", "seluruhnya", "semakin", "sementara", "sempat", "semuanya", "sendiri", "sendirinya", "seolah", "sepertinya", "seringnya", "serta", "siapakah", "siapapun", "disinilah", "sini", "sinilah", "sesuatu", "sesuatunya", "suatu", "sesudah", "sesudahnya", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tak", "tanpa", "tentu", "tentulah", "tertentu", "seterusnya", "tiap", "setidaknya", "tidakkah", "tidaklah", "toh", "waduh", "wah", "wahai", "sewaktu", "walau", "walaupun", "wong", "yaitu", "yakni"); 

        foreach ($stopwords as &$word) {
            $word = '/\b' . preg_quote($word, '/') . '\b/';
        }
        
        $teks = preg_replace($stopwords, '', $teks);

    //3. terapkan stemming
        
        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer  = $stemmerFactory->createStemmer();

        $teks   = $stemmer->stem($teks);

    return $teks;
} 

function indexing() {
    include 'koneksi.php';

    $query = "TRUNCATE TABLE tbindex";
    mysqli_query($db ,$query);

    $query = "SELECT * FROM tbberita ORDER BY Id";	
    $resBerita = mysqli_query($db, $query);
    $num_rows = mysqli_num_rows($resBerita);
        print("Mengindeks sebanyak " . $num_rows . " berita. <br />");

    while($row = mysqli_fetch_array($resBerita)) {  			
        $docId = $row['Id'];  
        $berita = $row['Berita'];  

        //terapkan preprocessing  			
        $berita = preproses($berita);

        $aberita = explode(" ", trim($berita));

        foreach ($aberita as $j => $value) {				
            
            if ($aberita[$j] != "") {				

                $query = "SELECT Count FROM tbindex WHERE Term = '$aberita[$j]' AND DocId = $docId";
                $rescount = mysqli_query($db, $query);			
                $num_rows = mysqli_num_rows($rescount);
            
                if ($num_rows > 0) {					
                    $rowcount = mysqli_fetch_array($rescount);							
                    $count = $rowcount['Count'];
                    $count++;

                    $query = "UPDATE tbindex SET Count = $count WHERE Term = '$aberita[$j]' AND DocId = $docId";
                    mysqli_query($db, $query);
                } 
               
                else {				
                    mysqli_query($db, "INSERT INTO tbindex (Term, DocId, Count) VALUES ('$aberita[$j]', $docId, 1)");
                }
            } //end if
        } //end foreach			
      } //end while
}

function hitungbobot() {

include 'koneksi.php';

//n
$resn = mysqli_query($db, "SELECT DISTINCT DocId FROM tbindex");
$n = mysqli_num_rows($resn);

$resBobot = mysqli_query($db, "SELECT * FROM tbindex ORDER BY Id");
$num_rows = mysqli_num_rows($resBobot);
print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

while($rowbobot = mysqli_fetch_array($resBobot)) {
    
    $term = $rowbobot['Term'];		
    $tf = $rowbobot['Count'];
    $id = $rowbobot['Id'];
    
    //N
    $resNTerm = mysqli_query($db, "SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
    $rowNTerm = mysqli_fetch_array($resNTerm);
    $NTerm = $rowNTerm['N'];
    
    $w = $tf * (log10($n/$NTerm));
    
    
    $resUpdateBobot = mysqli_query($db, "UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  } //end while $rowbobot   
} //end function hitungbobot

function panjangvektor() {	

include 'koneksi.php';

mysqli_query($db, "TRUNCATE TABLE tbvektor");
    
$resDocId = mysqli_query($db, "SELECT DISTINCT DocId FROM tbindex");

$num_rows = mysqli_num_rows($resDocId);
print("Terdapat " . $num_rows . " dokumen yang dihitung panjang vektornya. <br />");

while($rowDocId = mysqli_fetch_array($resDocId)) {
    $docId = $rowDocId['DocId'];

    $resVektor = mysqli_query($db, "SELECT Bobot FROM tbindex WHERE DocId = $docId");
    
    $panjangVektor = 0;		
    while($rowVektor = mysqli_fetch_array($resVektor)) {
        $panjangVektor = $panjangVektor + $rowVektor['Bobot']  *  $rowVektor['Bobot'];	
    }
    
    $panjangVektor = sqrt($panjangVektor);
    

    $resInsertVektor = mysqli_query($db, "INSERT INTO tbvektor (DocId, Panjang) VALUES ($docId, $panjangVektor)");	
} //end while $rowDocId
} //end function panjangvektor

function hitungsim($query) {

include 'koneksi.php';

$resn = mysqli_query($db, "SELECT Count(*) as n FROM tbvektor");
$rown = mysqli_fetch_array($resn);	
$n = $rown['n'];

$aquery = explode(" ", $query);

$panjangQuery = 0;
$aBobotQuery = array();

for ($i=0; $i<count($aquery); $i++) {

    $resNTerm = mysqli_query($db, "SELECT Count(*) as N from tbindex WHERE Term = '$aquery[$i]'");
    $rowNTerm = mysqli_fetch_array($resNTerm);	
    $NTerm = $rowNTerm['N'] ;
    
    $idf = log($n/$NTerm);
    
    $aBobotQuery[$i] = $idf;
    
    $panjangQuery = $panjangQuery + $idf * $idf;		
}

$panjangQuery = sqrt($panjangQuery);

$jumlahmirip = 0;

$resDocId = mysqli_query($db, "SELECT * FROM tbvektor ORDER BY DocId");
while ($rowDocId = mysqli_fetch_array($resDocId)) {

    $dotproduct = 0;
        
    $docId = $rowDocId['DocId'];
    $panjangDocId = $rowDocId['Panjang'];
    
    $resTerm = mysqli_query($db, "SELECT * FROM tbindex WHERE DocId = $docId");
    while ($rowTerm = mysqli_fetch_array($resTerm)) {
        for ($i=0; $i<count($aquery); $i++) {

            if ($rowTerm['Term'] == $aquery[$i]) {
                $dotproduct = $dotproduct + $rowTerm['Bobot'] * $aBobotQuery[$i];				
            } //end if		
        } //end for $i		
    } //end while ($rowTerm)
    
    if ($dotproduct > 0) {
        $sim = $dotproduct / ($panjangQuery * $panjangDocId);	
        $resInsertCache = mysqli_query($db, "INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', $docId, $sim)");
        $jumlahmirip++;
    } 
    
} //end while $rowDocId

if ($jumlahmirip == 0) {
    $resInsertCache = mysqli_query($db, "INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', 0, 0)");
}	
    
} //end hitungSim()

function ambilcache($keyword) {
include 'koneksi.php';

$resCache = mysqli_query($db, "SELECT *  FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
$num_rows = mysqli_num_rows($resCache);
    
if ($num_rows >0) {
    //tampilkan semua berita yang telah terurut
    while ($rowCache = mysqli_fetch_array($resCache)) {
        $docId = $rowCache['DocId'];
        $sim = $rowCache['Value'];

        if ($docId != 0) {					
            //ambil berita dari tabel tbberita, tampilkan
            $resBerita = mysqli_query($db, "SELECT * FROM tbberita WHERE Id = $docId");
            $rowBerita = mysqli_fetch_array($resBerita);
                
            $judul = $rowBerita['Judul'];
            $berita = $rowBerita['Berita'];
                
            print($docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />");
            print($berita . "<hr />"); 		
        } else {
            print("<b>Tidak ada... </b><hr />");
        }
    } //end while (rowCache = mysql_fetch_array($resCache))
}//end if $num_rows>0

else{
    
    hitungsim($keyword);
    $query = "SELECT *  FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC";
    $resCache = mysqli_query($db, $query);
    $num_rows = mysqli_num_rows($resCache);
    while ($rowCache = mysqli_fetch_array($resCache)) {
        $docId = $rowCache['DocId'];
        $sim = $rowCache['Value'];
        if ($docId != 0) {
            
            //ambil berita dari tabel tbberita, tampilkan
            $query = "SELECT * FROM tbberita WHERE Id = $docId";
            $resBerita = mysqli_query($db, $query);
            
            $rowBerita = mysqli_fetch_array($resBerita);
                
            $judul = $rowBerita['Judul'];
            $berita = $rowBerita['Berita'];
                
            print($docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />");
            print($berita . "<hr />"); 		
        } else {
            print("<b>Tidak ada... </b><hr />");
        }
    }
}
}

?>
