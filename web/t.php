<?php 
echo "lll";
$app = $exdata[1];
$add = $exdata[2];
$api = $exdata[3];
$country = $exdata[4];
$API = str_replace(["Ai"], ["5sim.biz"], $api);
if ($add >= 1 and $add <= 14) {
    $status = str_replace(["10", "11", "12", "13", "14", "1", "2", "3", "4", "5", "6", "7", "8", "9"], ["J", "K", "L", "M", "N", "A", "B", "C", "D", "E", "F", "G", "H", "I"], $add);
} else {
    $status = $add;
}
$APP = str_replace(["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40"], ["واتسأب", "واتسأب", "تيليجرام", "فيسبوك", "إنستقرام", "تويتر", "تيك توك", "قوقل", "ايمو", "فايبر", "سناب شات", "نيتفلكس", "حراج", "السيرفر العام", "عشوائي واتسأب", "عشوائي واتسأب", "عشوائي واتسأب", "عشوائي واتسأب", "عشوائي واتسأب", "عشوائي تيليجرام", "عشوائي تيليجرام", "عشوائي تيليجرام", "عشوائي تيليجرام", "عشوائي تيليجرام", "واتسأب المميز", "واتسأب المميز", "واتسأب المميز", "واتسأب المميز", "واتسأب المميز", "تيليجرام المميز", "تيليجرام المميز", "تيليجرام المميز", "تيليجرام المميز", "تيليجرام المميز"], $status);
$name = $_co['country'][$country];
$zx = $o_co['country'][$country];
$app_5sim = str_replace(["wa", "tg", "fb", "ig", "tw", "lf", "go", "im", "vi", "fu", "nf", "au", "ot"], ["whatsapp", "telegram", "facebook", "instagram", "twitter", "tiktok", "google", "imo", "viber", "snapchat", "netflix", "haraj", "other"], $app);
$all = json_decode(file_get_contents("https://5sim.biz/v1/guest/prices?country=$country&product=$app_5sim"), 1);
$adds = $all[$zx][$app_5sim]["019"]['count'];
$price = $all[$zx][$app_5sim]["019"]['cost'];
if ($price != null) {
    $bee019 = "019";
    $bee0191 = "$price ₽| $adds";
} else {
    $bee019 = null;
    $bee0191 = null;
}
$adds = $all[$zx][$app_5sim]["activ"]['count'];
$price = $all[$zx][$app_5sim]["activ"]['cost'];
if ($price != null) {
    $activ = "activ";
    $activ1 = "$price ₽| $adds";
} else {
    $activ = null;
    $activ1 = null;
}
$adds = $all[$zx][$app_5sim]["altel"]['count'];
$price = $all[$zx][$app_5sim]["altel"]['cost'];
if ($price != null) {
    $altel = "altel";
    $altel1 = "$price ₽| $adds";
} else {
    $altel = null;
    $altel1 = null;
}
$adds = $all[$zx][$app_5sim]["beeline"]['count'];
$price = $all[$zx][$app_5sim]["beeline"]['cost'];
if ($price != null) {
    $beeline = "beeline";
    $beeline1 = "$price ₽| $adds";
} else {
    $beeline = null;
    $beeline1 = null;
}
$adds = $all[$zx][$app_5sim]["claro"]['count'];
$price = $all[$zx][$app_5sim]["claro"]['cost'];
if ($price != null) {
    $claro = "claro";
    $claro1 = "$price ₽| $adds";
} else {
    $claro = null;
    $claro1 = null;
}
$adds = $all[$zx][$app_5sim]["ee"]['count'];
$price = $all[$zx][$app_5sim]["ee"]['cost'];
if ($price != null) {
    $ee = "ee";
    $ee1 = "$price ₽| $adds";
} else {
    $ee = null;
    $ee1 = null;
}
$adds = $all[$zx][$app_5sim]["globe"]['count'];
$price = $all[$zx][$app_5sim]["globe"]['cost'];
if ($price != null) {
    $globe = "globe";
    $globe1 = "$price ₽| $adds";
} else {
    $globe = null;
    $globe1 = null;
}
$adds = $all[$zx][$app_5sim]["kcell"]['count'];
$price = $all[$zx][$app_5sim]["kcell"]['cost'];
if ($price != null) {
    $kcell = "kcell";
    $kcell1 = "$price ₽| $adds";
} else {
    $kcell = null;
    $kcell1 = null;
}
$adds = $all[$zx][$app_5sim]["lycamobile"]['count'];
$price = $all[$zx][$app_5sim]["lycamobile"]['cost'];
if ($price != null) {
    $lycamobile = "lycamobile";
    $lycamobile1 = "$price ₽| $adds";
} else {
    $lycamobile = null;
    $lycamobile1 = null;
}
$adds = $all[$zx][$app_5sim]["matrix"]['count'];
$price = $all[$zx][$app_5sim]["matrix"]['cost'];
if ($price != null) {
    $matrix = "matrix";
    $matrix1 = "$price ₽| $adds";
} else {
    $matrix = null;
    $matrix1 = null;
}
$adds = $all[$zx][$app_5sim]["megafon"]['count'];
$price = $all[$zx][$app_5sim]["megafon"]['cost'];
if ($price != null) {
    $megafon = "megafon";
    $megafon1 = "$price ₽| $adds";
} else {
    $megafon = null;
    $megafon1 = null;
}
$adds = $all[$zx][$app_5sim]["mts"]['count'];
$price = $all[$zx][$app_5sim]["mts"]['cost'];
if ($price != null) {
    $mts = "mts";
    $mts1 = "$price ₽| $adds";
} else {
    $mts = null;
    $mts1 = null;
}
$adds = $all[$zx][$app_5sim]["orange"]['count'];
$price = $all[$zx][$app_5sim]["orange"]['cost'];
if ($price != null) {
    $orange = "orange";
    $orange1 = "$price ₽| $adds";
} else {
    $orange = null;
    $orange1 = null;
}
$adds = $all[$zx][$app_5sim]["pildyk"]['count'];
$price = $all[$zx][$app_5sim]["pildyk"]['cost'];
if ($price != null) {
    $pildyk = "pildyk";
    $pildyk1 = "$price ₽| $adds";
} else {
    $pildyk = null;
    $pildyk1 = null;
}
$adds = $all[$zx][$app_5sim]["play"]['count'];
$price = $all[$zx][$app_5sim]["play"]['cost'];
if ($price != null) {
    $play = "play";
    $play1 = "$price ₽| $adds";
} else {
    $play = null;
    $play1 = null;
}
$adds = $all[$zx][$app_5sim]["redbullmobile"]['count'];
$price = $all[$zx][$app_5sim]["redbullmobile"]['cost'];
if ($price != null) {
    $redbullmobile = "redbullmobile";
    $redbullmobile1 = "$price ₽| $adds";
} else {
    $redbullmobile = null;
    $redbullmobile1 = null;
}
$adds = $all[$zx][$app_5sim]["rostelecom"]['count'];
$price = $all[$zx][$app_5sim]["rostelecom"]['cost'];
if ($price != null) {
    $rostelecom = "rostelecom";
    $rostelecom1 = "$price ₽| $adds";
} else {
    $rostelecom = null;
    $rostelecom1 = null;
}
$adds = $all[$zx][$app_5sim]["smart"]['count'];
$price = $all[$zx][$app_5sim]["smart"]['cost'];
if ($price != null) {
    $smart = "smart";
    $smart1 = "$price ₽| $adds";
} else {
    $smart = null;
    $smart1 = null;
}
$adds = $all[$zx][$app_5sim]["sun"]['count'];
$price = $all[$zx][$app_5sim]["sun"]['cost'];
if ($price != null) {
    $sun = "sun";
    $sun1 = "$price ₽| $adds";
} else {
    $sun = null;
    $sun1 = null;
}
$adds = $all[$zx][$app_5sim]["tele2"]['count'];
$price = $all[$zx][$app_5sim]["tele2"]['cost'];
if ($price != null) {
    $tele2 = "tele2";
    $tele21 = "$price ₽| $adds";
} else {
    $tele2 = null;
    $tele21 = null;
}
$adds = $all[$zx][$app_5sim]["three"]['count'];
$price = $all[$zx][$app_5sim]["three"]['cost'];
if ($price != null) {
    $three = "three";
    $three1 = "$price ₽| $adds";
} else {
    $three = null;
    $three1 = null;
}
$adds = $all[$zx][$app_5sim]["tigo"]['count'];
$price = $all[$zx][$app_5sim]["tigo"]['cost'];
if ($price != null) {
    $tigo = "tigo";
    $tigo1 = "$price ₽| $adds";
} else {
    $tigo = null;
    $tigo1 = null;
}
$adds = $all[$zx][$app_5sim]["tmobile"]['count'];
$price = $all[$zx][$app_5sim]["tmobile"]['cost'];
if ($price != null) {
    $tmobile = "tmobile";
    $tmobile1 = "$price ₽| $adds";
} else {
    $tmobile = null;
    $tmobile1 = null;
}
$adds = $all[$zx][$app_5sim]["tnt"]['count'];
$price = $all[$zx][$app_5sim]["tnt"]['cost'];
if ($price != null) {
    $tnt = "tnt";
    $tnt1 = "$price ₽| $adds";
} else {
    $tnt = null;
    $tnt1 = null;
}
$adds = $all[$zx][$app_5sim]["virginmobile"]['count'];
$price = $all[$zx][$app_5sim]["virginmobile"]['cost'];
if ($price != null) {
    $virginmobile = "virginmobile";
    $virginmobile1 = "$price ₽| $adds";
} else {
    $virginmobile = null;
    $virginmobile1 = null;
}
$adds = $all[$zx][$app_5sim]["virtual2"]['count'];
$price = $all[$zx][$app_5sim]["virtual2"]['cost'];
if ($price != null) {
    $virtual2 = "virtual2";
    $virtual21 = "$price ₽| $adds";
} else {
    $virtual2 = null;
    $virtual21 = null;
}
$adds = $all[$zx][$app_5sim]["virtual4"]['count'];
$price = $all[$zx][$app_5sim]["virtual4"]['cost'];
if ($price != null) {
    $virtual4 = "virtual4";
    $virtual41 = "$price ₽| $adds";
} else {
    $virtual4 = null;
    $virtual41 = null;
}
$adds = $all[$zx][$app_5sim]["virtual5"]['count'];
$price = $all[$zx][$app_5sim]["virtual5"]['cost'];
if ($price != null) {
    $virtual5 = "virtual5";
    $virtual51 = "$price ₽| $adds";
} else {
    $virtual5 = null;
    $virtual51 = null;
}
$adds = $all[$zx][$app_5sim]["virtual7"]['count'];
$price = $all[$zx][$app_5sim]["virtual7"]['cost'];
if ($price != null) {
    $virtual7 = "virtual7";
    $virtual71 = "$price ₽| $adds";
} else {
    $virtual7 = null;
    $virtual71 = null;
}
$adds = $all[$zx][$app_5sim]["virtual8"]['count'];
$price = $all[$zx][$app_5sim]["virtual8"]['cost'];
if ($price != null) {
    $virtual8 = "virtual8";
    $virtual81 = "$price ₽| $adds";
} else {
    $virtual8 = null;
    $virtual81 = null;
}
$adds = $all[$zx][$app_5sim]["virtual12"]['count'];
$price = $all[$zx][$app_5sim]["virtual12"]['cost'];
if ($price != null) {
    $virtual12 = "virtual12";
    $virtual121 = "$price ₽| $adds";
} else {
    $virtual12 = null;
    $virtual121 = null;
}
$adds = $all[$zx][$app_5sim]["virtual15"]['count'];
$price = $all[$zx][$app_5sim]["virtual15"]['cost'];
if ($price != null) {
    $virtual15 = "virtual15";
    $virtual151 = "$price ₽| $adds";
} else {
    $virtual15 = null;
    $virtual151 = null;
}
$adds = $all[$zx][$app_5sim]["virtual16"]['count'];
$price = $all[$zx][$app_5sim]["virtual16"]['cost'];
if ($price != null) {
    $virtual16 = "virtual16";
    $virtual161 = "$price ₽| $adds";
} else {
    $virtual16 = null;
    $virtual161 = null;
}
$adds = $all[$zx][$app_5sim]["virtual17"]['count'];
$price = $all[$zx][$app_5sim]["virtual17"]['cost'];
if ($price != null) {
    $virtual17 = "virtual17";
    $virtual171 = "$price ₽| $adds";
} else {
    $virtual17 = null;
    $virtual171 = null;
}
$adds = $all[$zx][$app_5sim]["virtual18"]['count'];
$price = $all[$zx][$app_5sim]["virtual18"]['cost'];
if ($price != null) {
    $virtual18 = "virtual18";
    $virtual181 = "$price ₽| $adds";
} else {
    $virtual18 = null;
    $virtual181 = null;
}
$adds = $all[$zx][$app_5sim]["virtual19"]['count'];
$price = $all[$zx][$app_5sim]["virtual19"]['cost'];
if ($price != null) {
    $virtual19 = "virtual19";
    $virtual191 = "$price ₽| $adds";
} else {
    $virtual19 = null;
    $virtual191 = null;
}
$adds = $all[$zx][$app_5sim]["virtual20"]['count'];
$price = $all[$zx][$app_5sim]["virtual20"]['cost'];
if ($price != null) {
    $virtual20 = "virtual20";
    $virtual201 = "$price ₽| $adds";
} else {
    $virtual20 = null;
    $virtual201 = null;
}
$adds = $all[$zx][$app_5sim]["virtual21"]['count'];
$price = $all[$zx][$app_5sim]["virtual21"]['cost'];
if ($price != null) {
    $virtual21a = "virtual21";
    $virtual211 = "$price ₽| $adds";
} else {
    $virtual21a = null;
    $virtual211 = null;
}
$adds = $all[$zx][$app_5sim]["virtual22"]['count'];
$price = $all[$zx][$app_5sim]["virtual22"]['cost'];
if ($price != null) {
    $virtual22 = "virtual22";
    $virtual221 = "$price ₽| $adds";
} else {
    $virtual22 = null;
    $virtual221 = null;
}
$adds = $all[$zx][$app_5sim]["virtual23"]['count'];
$price = $all[$zx][$app_5sim]["virtual23"]['cost'];
if ($price != null) {
    $virtual23 = "virtual23";
    $virtual231 = "$price ₽| $adds";
} else {
    $virtual23 = null;
    $virtual231 = null;
}
$adds = $all[$zx][$app_5sim]["virtual24"]['count'];
$price = $all[$zx][$app_5sim]["virtual24"]['cost'];
if ($price != null) {
    $virtual24 = "virtual24";
    $virtual241 = "$price ₽| $adds";
} else {
    $virtual24 = null;
    $virtual241 = null;
}
$adds = $all[$zx][$app_5sim]["virtual25"]['count'];
$price = $all[$zx][$app_5sim]["virtual25"]['cost'];
if ($price != null) {
    $virtual25 = "virtual25";
    $virtual251 = "$price ₽| $adds";
} else {
    $virtual25 = null;
    $virtual251 = null;
}
$adds = $all[$zx][$app_5sim]["virtual26"]['count'];
$price = $all[$zx][$app_5sim]["virtual26"]['cost'];
if ($price != null) {
    $virtual26 = "virtual26";
    $virtual261 = "$price ₽| $adds";
} else {
    $virtual26 = null;
    $virtual261 = null;
}
$adds = $all[$zx][$app_5sim]["virtual27"]['count'];
$price = $all[$zx][$app_5sim]["virtual27"]['cost'];
if ($price != null) {
    $virtual27 = "virtual27";
    $virtual271 = "$price ₽| $adds";
} else {
    $virtual27 = null;
    $virtual271 = null;
}
$adds = $all[$zx][$app_5sim]["virtual28"]['count'];
$price = $all[$zx][$app_5sim]["virtual28"]['cost'];
if ($price != null) {
    $virtual28 = "virtual28";
    $virtual281 = "$price ₽| $adds";
} else {
    $virtual28 = null;
    $virtual281 = null;
}
$adds = $all[$zx][$app_5sim]["virtual29"]['count'];
$price = $all[$zx][$app_5sim]["virtual29"]['cost'];
if ($price != null) {
    $virtual29 = "virtual29";
    $virtual291 = "$price ₽| $adds";
} else {
    $virtual29 = null;
    $virtual291 = null;
}
$adds = $all[$zx][$app_5sim]["virtual30"]['count'];
$price = $all[$zx][$app_5sim]["virtual30"]['cost'];
if ($price != null) {
    $virtual30 = "virtual30";
    $virtual301 = "$price ₽| $adds";
} else {
    $virtual30 = null;
    $virtual301 = null;
}
$adds = $all[$zx][$app_5sim]["virtual31"]['count'];
$price = $all[$zx][$app_5sim]["virtual31"]['cost'];
if ($price != null) {
    $virtual31 = "virtual31";
    $virtual311 = "$price ₽| $adds";
} else {
    $virtual31 = null;
    $virtual311 = null;
}
$adds = $all[$zx][$app_5sim]["virtual32"]['count'];
$price = $all[$zx][$app_5sim]["virtual32"]['cost'];
if ($price != null) {
    $virtual32 = "virtual32";
    $virtual321 = "$price ₽| $adds";
} else {
    $virtual32 = null;
    $virtual321 = null;
}
$adds = $all[$zx][$app_5sim]["virtual33"]['count'];
$price = $all[$zx][$app_5sim]["virtual33"]['cost'];
if ($price != null) {
    $virtual33 = "virtual33";
    $virtual331 = "$price ₽| $adds";
} else {
    $virtual33 = null;
    $virtual331 = null;
}
$adds = $all[$zx][$app_5sim]["virtual34"]['count'];
$price = $all[$zx][$app_5sim]["virtual34"]['cost'];
if ($price != null) {
    $virtual34 = "virtual34";
    $virtual341 = "$price ₽| $adds";
} else {
    $virtual34 = null;
    $virtual341 = null;
}
$adds = $all[$zx][$app_5sim]["virtual35"]['count'];
$price = $all[$zx][$app_5sim]["virtual35"]['cost'];
if ($price != null) {
    $virtual35 = "virtual35";
    $virtual351 = "$price ₽| $adds";
} else {
    $virtual35 = null;
    $virtual351 = null;
}
$adds = $all[$zx][$app_5sim]["virtual36"]['count'];
$price = $all[$zx][$app_5sim]["virtual36"]['cost'];
if ($price != null) {
    $virtual36 = "virtual36";
    $virtual361 = "$price ₽| $adds";
} else {
    $virtual36 = null;
    $virtual361 = null;
}
$adds = $all[$zx][$app_5sim]["virtual37"]['count'];
$price = $all[$zx][$app_5sim]["virtual37"]['cost'];
if ($price != null) {
    $virtual37 = "virtual37";
    $virtual371 = "$price ₽| $adds";
} else {
    $virtual37 = null;
    $virtual371 = null;
}
$adds = $all[$zx][$app_5sim]["vodafone"]['count'];
$price = $all[$zx][$app_5sim]["vodafone"]['cost'];
if ($price != null) {
    $vodafone = "vodafone";
    $vodafone1 = "$price ₽| $adds";
} else {
    $vodafone = null;
    $vodafone1 = null;
}
$adds = $all[$zx][$app_5sim]["yota"]['count'];
$price = $all[$zx][$app_5sim]["yota"]['cost'];
if ($price != null) {
    $yota = "yota";
    $yota1 = "$price ₽| $adds";
} else {
    $yota = null;
    $yota1 = null;
}
$adds = $all[$zx][$app_5sim]["zz"]['count'];
$price = $all[$zx][$app_5sim]["zz"]['cost'];
if ($price != null) {
    $zz = "zz";
    $zz1 = "$price ₽| $adds";
} else {
    $zz = null;
    $zz1 = null;
}
if ($zz == null and $yota == null and $vodafone == null and $virtual32 == null and $virtual31 == null and $virtual30 == null and $virtual29 == null and $virtual28 == null and $virtual27 == null and $virtual26 == null and $virtual25 == null and $virtual24 == null and $virtual23 == null and $virtual22 == null and $virtual21a == null and $virtual20 == null and $virtual19 == null and $virtual18 == null and $virtual17 == null and $virtual16 == null and $virtual15 == null and $virtual12 == null and $virtual8 == null and $virtual7 == null and $virtual5 == null and $virtual4 == null and $virtual2 == null and $virginmobile == null and $tnt == null and $tmobile == null and $tigo == null and $three == null and $tele2 == null and $sun == null and $smart == null and $rostelecom == null and $redbullmobile == null and $play == null and $pildyk == null and $orange == null and $mts == null and $megafon == null and $matrix == null and $lycamobile == null and $kcell == null and $globe == null and $ee == null and $claro == null and $beeline == null and $altel == null and $activ == null and $bee019 == null) {
    $adds = json_decode(file_get_contents("https://5sim.biz/v1/guest/products/" . $zx . "/" . "any"))->{$app_5sim}->Qty;
    $price = json_decode(file_get_contents("https://5sim.biz/v1/guest/products/" . $zx . "/" . "any"))->{$app_5sim}->Price;
    if ($price != null) {
    $any = "any";
    $any1 = "$price ₽| $adds";
    } else {
    $any = null;
    $any1 = null;
    }
}
bot('EditMessageText', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => "
🎗 - تم حفظ الدولة والتطبيق ✅

☑️ - الدولة: $name 🌀
✳️ - التطبيق: $APP 📲
🌐 - الموقع: $API
🅿️ - قم ب إختيار السيرفر لهذه الدولة ⏬
",
    'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => "$any1", 'callback_data' => "addprice-$app-$add-$api-$country-$any"], ['text' => "$any", 'callback_data' => "addprice-$app-$add-$api-$country-$any"]],
        [['text' => "$bee0191", 'callback_data' => "addprice-$app-$add-$api-$country-$bee019"], ['text' => "$bee019", 'callback_data' => "addprice-$app-$add-$api-$country-$bee019"]],
        [['text' => "$activ1", 'callback_data' => "addprice-$app-$add-$api-$country-$activ"], ['text' => "$activ", 'callback_data' => "addprice-$app-$add-$api-$country-$activ"]],
        [['text' => "$altel1", 'callback_data' => "addprice-$app-$add-$api-$country-$altel"], ['text' => "$altel", 'callback_data' => "addprice-$app-$add-$api-$country-$altel"]],
        [['text' => "$beeline1", 'callback_data' => "addprice-$app-$add-$api-$country-$beeline"], ['text' => "$beeline", 'callback_data' => "addprice-$app-$add-$api-$country-$beeline"]],
        [['text' => "$claro1", 'callback_data' => "addprice-$app-$add-$api-$country-$claro"], ['text' => "$claro", 'callback_data' => "addprice-$app-$add-$api-$country-$claro"]],
        [['text' => "$ee1", 'callback_data' => "addprice-$app-$add-$api-$country-$ee"], ['text' => "$ee", 'callback_data' => "addprice-$app-$add-$api-$country-$ee"]],
        [['text' => "$globe1", 'callback_data' => "addprice-$app-$add-$api-$country-$globe"], ['text' => "$globe", 'callback_data' => "addprice-$app-$add-$api-$country-$globe"]],
        [['text' => "$kcell1", 'callback_data' => "addprice-$app-$add-$api-$country-$kcell"], ['text' => "$kcell", 'callback_data' => "addprice-$app-$add-$api-$country-$kcell"]],
        [['text' => "$lycamobile1", 'callback_data' => "addprice-$app-$add-$api-$country-$lycamobile"], ['text' => "$lycamobile", 'callback_data' => "addprice-$app-$add-$api-$country-$lycamobile"]],
        [['text' => "$matrix1", 'callback_data' => "addprice-$app-$add-$api-$country-$matrix"], ['text' => "$matrix", 'callback_data' => "addprice-$app-$add-$api-$country-$matrix"]],
        [['text' => "$megafon1", 'callback_data' => "addprice-$app-$add-$api-$country-$megafon"], ['text' => "$megafon", 'callback_data' => "addprice-$app-$add-$api-$country-$megafon"]],
        [['text' => "$mts1", 'callback_data' => "addprice-$app-$add-$api-$country-$mts"], ['text' => "$mts", 'callback_data' => "addprice-$app-$add-$api-$country-$mts"]],
        [['text' => "$orange1", 'callback_data' => "addprice-$app-$add-$api-$country-$orange"], ['text' => "$orange", 'callback_data' => "addprice-$app-$add-$api-$country-$orange"]],
        [['text' => "$pildyk1", 'callback_data' => "addprice-$app-$add-$api-$country-$pildyk"], ['text' => "$pildyk", 'callback_data' => "addprice-$app-$add-$api-$country-$pildyk"]],
        [['text' => "$play1", 'callback_data' => "addprice-$app-$add-$api-$country-$play"], ['text' => "$play", 'callback_data' => "addprice-$app-$add-$api-$country-$play"]],
        [['text' => "$redbullmobile1", 'callback_data' => "addprice-$app-$add-$api-$country-$redbullmobile"], ['text' => "$redbullmobile", 'callback_data' => "addprice-$app-$add-$api-$country-$redbullmobile"]],
        [['text' => "$rostelecom1", 'callback_data' => "addprice-$app-$add-$api-$country-$rostelecom"], ['text' => "$rostelecom", 'callback_data' => "addprice-$app-$add-$api-$country-$rostelecom"]],
        [['text' => "$smart1", 'callback_data' => "addprice-$app-$add-$api-$country-$smart"], ['text' => "$smart", 'callback_data' => "addprice-$app-$add-$api-$country-$smart"]],
        [['text' => "$sun1", 'callback_data' => "addprice-$app-$add-$api-$country-$sun"], ['text' => "$sun", 'callback_data' => "addprice-$app-$add-$api-$country-$sun"]],
        [['text' => "$tele21", 'callback_data' => "addprice-$app-$add-$api-$country-$tele2"], ['text' => "$tele2", 'callback_data' => "addprice-$app-$add-$api-$country-$tele2"]],
        [['text' => "$three1", 'callback_data' => "addprice-$app-$add-$api-$country-$three"], ['text' => "$three", 'callback_data' => "addprice-$app-$add-$api-$country-$three"]],
        [['text' => "$tigo1", 'callback_data' => "addprice-$app-$add-$api-$country-$tigo"], ['text' => "$tigo", 'callback_data' => "addprice-$app-$add-$api-$country-$tigo"]],
        [['text' => "$tmobile1", 'callback_data' => "addprice-$app-$add-$api-$country-$tmobile"], ['text' => "$tmobile", 'callback_data' => "addprice-$app-$add-$api-$country-$tmobile"]],
        [['text' => "$tnt1", 'callback_data' => "addprice-$app-$add-$api-$country-$tnt"], ['text' => "$tnt", 'callback_data' => "addprice-$app-$add-$api-$country-$tnt"]],
        [['text' => "$virginmobile1", 'callback_data' => "addprice-$app-$add-$api-$country-$virginmobile"], ['text' => "$virginmobile", 'callback_data' => "addprice-$app-$add-$api-$country-$virginmobile"]],
        [['text' => "$virtual21", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual2"], ['text' => "$virtual2", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual2"]],
        [['text' => "$virtual41", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual4"], ['text' => "$virtual4", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual4"]],
        [['text' => "$virtual51", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual5"], ['text' => "$virtual5", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual5"]],
        [['text' => "$virtual71", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual7"], ['text' => "$virtual7", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual7"]],
        [['text' => "$virtual81", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual8"], ['text' => "$virtual8", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual8"]],
        [['text' => "$virtual121", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual12"], ['text' => "$virtual12", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual12"]],
        [['text' => "$virtual151", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual15"], ['text' => "$virtual15", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual15"]],
        [['text' => "$virtual161", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual16"], ['text' => "$virtual16", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual16"]],
        [['text' => "$virtual171", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual17"], ['text' => "$virtual17", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual17"]],
        [['text' => "$virtual181", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual18"], ['text' => "$virtual18", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual18"]],
        [['text' => "$virtual191", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual19"], ['text' => "$virtual19", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual19"]],
        [['text' => "$virtual201", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual20"], ['text' => "$virtual20", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual20"]],
        [['text' => "$virtual211", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual21a"], ['text' => "$virtual21a", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual21a"]],
        [['text' => "$virtual221", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual22"], ['text' => "$virtual22", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual22"]],
        [['text' => "$virtual231", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual23"], ['text' => "$virtual23", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual23"]],
        [['text' => "$virtual241", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual24"], ['text' => "$virtual24", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual24"]],
        [['text' => "$virtual251", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual25"], ['text' => "$virtual25", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual25"]],
        [['text' => "$virtual261", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual26"], ['text' => "$virtual26", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual26"]],
        [['text' => "$virtual271", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual27"], ['text' => "$virtual27", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual27"]],
        [['text' => "$virtual281", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual28"], ['text' => "$virtual28", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual28"]],
        [['text' => "$virtual291", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual29"], ['text' => "$virtual29", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual29"]],
        [['text' => "$virtual301", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual30"], ['text' => "$virtual30", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual30"]],
        [['text' => "$virtual311", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual31"], ['text' => "$virtual31", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual31"]],
        [['text' => "$virtual321", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual32"], ['text' => "$virtual32", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual32"]],
        [['text' => "$virtual331", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual33"], ['text' => "$virtual33", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual33"]],
        [['text' => "$virtual341", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual34"], ['text' => "$virtual34", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual34"]],
        [['text' => "$virtual351", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual35"], ['text' => "$virtual35", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual35"]],
        [['text' => "$virtual361", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual36"], ['text' => "$virtual36", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual36"]],
        [['text' => "$virtual371", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual37"], ['text' => "$virtual37", 'callback_data' => "addprice-$app-$add-$api-$country-$virtual37"]],
        [['text' => "$vodafone1", 'callback_data' => "addprice-$app-$add-$api-$country-$vodafone"], ['text' => "$vodafone", 'callback_data' => "addprice-$app-$add-$api-$country-$vodafone"]],
        [['text' => "$yota1", 'callback_data' => "addprice-$app-$add-$api-$country-$yota"], ['text' => "$yota", 'callback_data' => "addprice-$app-$add-$api-$country-$yota"]],
        [['text' => "$zz1", 'callback_data' => "addprice-$app-$add-$api-$country-$zz"], ['text' => "$zz", 'callback_data' => "addprice-$app-$add-$api-$country-$zz"]],
        [['text' => 'رجوع', 'callback_data' => "iA-$app-$add-$api"]]
    ]
    ])
]);