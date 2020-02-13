<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<?php
$city = "";
$country = "";
$error = "hé petit coquin qu'est ce que tu essaies de faire ?!";

$countries = [
    "france" =>
        ["capital-name" => "paris",
            "flag" => "🇫🇷"],
    "belgique" => ["capital-name" => "bruxelles",
        "flag" => "🇧🇪"],
    "états-unis" => ["capital-name" => "washington DC",
        "flag" => "🇺🇸"],
    "corée du nord" => ["capital-name" => "pyongyang",
        "flag" => "🇰🇵"],
    "brésil" => ["capital-name" => "brasilia",
        "flag" => "🇧🇷"],
    "australie" => ["capital-name" => 'camberra',
        "flag" => "🇦🇺"],
    "japon" => ["capital-name" => 'tokyo',
        "flag" => "🇯🇵"],
    "congo" => ["capital-name" => 'kinshasa',
        "flag" => "🇨🇬"]
];

//Récupère la ville
function getCity($country, $countries, $city)
{
    if (array_key_exists($country, $countries)) {
        return $countries[$country];
    } else {

    }
}

;

//Check si un pays est passé dans l'url
if (isset($_GET['country']) && $_GET['country'] !== '') {
    $country = $_GET['country'];
    //execution of getCity
    $city = getCity($country, $countries, $city);
} else {
    $param = false;
};

//Renvoie la chaîne en lettres capitales
function toUp($str)
{
    echo mb_strtoupper($str);
}

;

//Renvoie la chaîne avec la première lettre en capitale
function firstLetterToUp($str)
{
    echo ucfirst($str);
}

;

?>
<form method="GET" action="index.php">
    <select name="country" id="country">

        <?php foreach ($countries as $key => $item) : ?>

            <option

                <?php if ($country === $key) {
                    echo('selected = \"selected\"');
                } ?>
                    value="<?= $key ?>">
                <?php toUp($key) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <p>Quelle est la capitale ? <b>
            <?php if ($country !== "") {
                firstLetterToUp($city["capital-name"]);
            } ?></b>
    </p>
    <p>
        <?php if ($country !== "") {
            echo $city["flag"];
        } ?>
    </p>
    <button type="submit">Valider</button>
</form>
</body>

</html>