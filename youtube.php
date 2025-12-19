<?php
if (file_exists('sig1.php')) {
    unlink('sig1.php');
}
function getc($url)
{
$ch = curl_init($url);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
}
function cut_yt($ganti){
        $arayganti=array('Youtube','youtube','YouTube');
        $ganti=str_replace($arayganti,'',$ganti);
        return $ganti;
    }
function quality($itag) {
        switch ($itag) {
            case "17":
                return "144P";
                break;
            case "278":
                return "144P";
                break;
            case "36":
                return "240P";
                break;
            case "242":
                return "240P";
                break;
            case "18":
                return "360P";
                break;
            case "243":
                return "360P";
                break;
            case "43":
                return "360P";
                break;
            case "35":
                return "480P";
                break;
            case "44":
                return "480P";
                break;
            case "135":
                return "480P";
                break;
            case "244":
                return "480P";
                break;
            case "22":
                return "720P";
                break;
            case "136":
                return "720P";
                break;
            case "247":
                return "720P";
                break;
            case "137":
                return "1080P";
                break;
            case "248":
                return "1080P";
                break;
            case "299":
                return "1080P (60 FPS)";
                break;
            case "138":
                return "2K";
                break;
            case "264":
                return "2K";
                break;
            case "271":
                return "2K";
                break;
            case "266":
                return "4K";
                break;
            case "313":
                return "4K (60 FPS)";
                break;
            case "139":
                return " 48 Kbps";
                break;
            case "140":
                return "128 Kbps";
                break;
            case "141":
                return " 128 Kbps";
                break;
            case "171":
                return " 128 Kbps";
                break;
            case "249":
                return " 50k";
                break;
            case "250":
                return " 70k";
                break;
            case "251":
                return " 160k";
                break;
            default:
                return $itag;
                break;
        }
    }
if (isset($_GET['id'])) {

    $id=$_GET['id'];

}else{
    die('hhhh');
}

$a= getc('https://www.youtube.com/embed/'.$id);

$ccc=explode('s/player/', $a);
$ddd=explode('/www-player.css', $ccc[1]);
$jdl=explode('<title>', $a);
$jdl=explode('</title>', $jdl[1]);
$judul=cut_yt($jdl[0]);

$gsts= file_get_contents('https://www.youtube.com/s/player/'.$ddd[0].'/player_ias.vflset/en_US/base.js');



function getchiper($decipherScript){
        $decipherPatterns = explode('.split("")', $decipherScript);
        unset($decipherPatterns[0]);
        foreach ($decipherPatterns as $value) {
            $value = explode('.join("")', explode('}', $value)[0]);
            if (count($value) === 2) {
                $value = explode(';', $value[0]);
                array_pop($value);
                unset($value[0]);
                $decipherPatterns = implode(';', $value);
                break;
            }
        }
        preg_match_all('/(?<=;).*?(?=\[|\.)/', $decipherPatterns, $deciphers);
        if ($deciphers && count($deciphers[0]) >= 2) {
            $deciphers = $deciphers[0][0];
        $deciphersObjectVar = $decipherPatterns ;
        $decipher = explode($deciphers . '={', $decipherScript)[1];
        $decipher = str_replace(["\n", "\r"], '', $decipher);
        $decipher = explode('}};', $decipher)[0];
        $decipher = explode('},', $decipher);
        // Convert deciphers to object
        $deciphers = [];

        foreach ($decipher as &$function) {
            $deciphers[explode(':function', $function)[0]] = explode('){', $function)[1];
        }
        // Convert pattern to array
        $decipherPatterns = str_replace($deciphersObjectVar . '.', '', $decipherPatterns);
        $decipherPatterns = str_replace($deciphersObjectVar . '[', '', $decipherPatterns);
        $decipherPatterns = str_replace(['](a,', '(a,'], '->(', $decipherPatterns);
        $decipherPatterns = explode(';', $decipherPatterns);
        $patterns =$decipherPatterns;
            $deciphers =$deciphers;
        for ($i=0; $i < count($patterns); $i++) {
            $executes = explode('->', $patterns[$i]);
            $execute=explode('.', $executes[0]);
            $number = intval(str_replace(['(', ')'], '', $executes[1]));
            $execute = $deciphers[$execute[1]];
            switch ($execute) {
                case 'a.reverse()':
                    $processSignature = '$reverse';
                break;
                case 'var c=a[0];a[0]=a[b%a.length];a[b]=c':
                    $processSignature= '$length';
                break;
                case 'var c=a[0];a[0]=a[b%a.length];a[b%a.length]=c':
                $processSignature= '$lengtha';
                break;
                case 'a.splice(0,b)':
                    $processSignature= '$splice';
                break;
                default:
                    die("\n==== Decipher dictionary was not found ====");

                break;
            }
        $myfile = fopen("sig1.php", "a+") or die("Unable to open file!");
        if ($i==0) {
            fwrite($myfile, '<?php $a = str_split($s);');
        }
        fwrite($myfile, $processSignature.'($a,'.$number.');');
        fclose($myfile);
        }
        }
        }

        function sig($s){
        $reverse=function(&$a){
                $a = array_reverse($a);
            };
            $splice=function(&$a, $b){
                 $a = array_slice($a, $b);
            };
            $length = function(&$a, $b){
                $c = $a[0];
                $a[0] = $a[$b % count($a)];
                $a[$b] = $c;
            };
            $lengtha = function(&$a, $b){
                $c = $a[0];
        $a[0] = $a[$b%count($a)];
        $a[$b%count($a)] = $c;
            };


        include('sig1.php');
        return join('',$a);
        }


getchiper($gsts);
$data = getc("https://www.youtube.com/get_video_info?video_id=".$id."&asv=3&el=detailpage&hl=en_US");
parse_str($data,$info);
    $streams = $info['player_response'];
        $jsn_str=str_replace("\u0026","&",$streams);
        $streamin_data_json=json_decode($jsn_str, true);
$str=$streamin_data_json["streamingData"]["formats"];

foreach ($str as $stream) {


if (isset($stream["signatureCipher"])) {
    parse_str($stream["signatureCipher"],$dturl);
 $json['default']=$dturl['url'].'&sig='.sig($dturl['s']);
}else{
    if (!empty($str['url'])) {
        $json['default']=$str['url'];
    }

}


}




$aud = array();
$vid = array();
foreach ($streamin_data_json["streamingData"]["adaptiveFormats"] as $stream) {
if (isset($stream["signatureCipher"])) {
    parse_str($stream["signatureCipher"],$dturl);
 $stream['url']=$dturl['url'].'&sig='.sig($dturl['s']);
}

if (preg_match('/audio/', $stream['mimeType'])) {
$url = $stream['url'];
    $values = array(
        'quality' => quality($stream['itag']),
        'url' => $url,
    );
    array_push($aud, $values);
}
if (preg_match('/video/', $stream['mimeType'])) {
$url = $stream['url'];
    $values = array(
        'quality' => quality($stream['itag']),
        'url' => $url,
    );
    array_push($vid, $values);
}
};

$json['audio']=$aud;
$json['video']=$vid;
$json['title']=$judul;

    echo  json_encode($json, JSON_FORCE_OBJECT);