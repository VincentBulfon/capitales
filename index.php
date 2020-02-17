<?php
$data = "";
$error = false;
$err = "hé petit coquin qu'est ce que tu essaies de faire ?! Tu ne peux pas rentrer des donnée qui n'existent pas!";

$countries = [
    "france" =>
    [
        "capital-name" => "paris",
        "flag" => "🇫🇷"
    ],
    "belgique" => [
        "capital-name" => "bruxelles",
        "flag" => "🇧🇪"
    ],
    "états-unis" => [
        "capital-name" => "washington DC",
        "flag" => "🇺🇸"
    ],
    "corée du nord" => [
        "capital-name" => "pyongyang",
        "flag" => "🇰🇵"
    ],
    "brésil" => [
        "capital-name" => "brasilia",
        "flag" => "🇧🇷"
    ],
    "australie" => [
        "capital-name" => 'camberra',
        "flag" => "🇦🇺"
    ],
    "japon" => [
        "capital-name" => 'tokyo',
        "flag" => "🇯🇵"
    ],
    "congo" => [
        "capital-name" => 'kinshasa',
        "flag" => "🇨🇬"
    ]
];

//Récupère la ville
function getCity($urlCountry, $countries)
{
    if (array_key_exists($urlCountry, $countries)) {
        return array($urlCountry, $countries[$urlCountry]);
    }
    return false;
};

//Check si un pays est passé dans l'url
if (isset($_GET['country']) && $_GET['country'] !== '') {
    $urlCountry = $_GET['country'];
    //execution of getCity
    $data = getCity($urlCountry, $countries);
}

//Renvoie la chaîne en lettres capitales
function toUp($str)
{
    return mb_strtoupper($str);
};

//Renvoie la chaîne avec la première lettre en capitale
function firstLetterToUp($str)
{
    return ucfirst($str);
};

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form method="GET" action="index.php">
        <select name="country" id="country">

            <?php foreach ($countries as $key => $item) : ?>

                <option <?php if ($data) : ?> <?php if ($data[0] === $key) : ?> <?php echo('selected = \"selected\"'); ?> <?php endif; ?> <?php endif; ?> value="<?= $key ?>">
                    <?php echo toUp($key) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <p>Quelle est la capitale ?
            <?php if (!$error) : ?>
                <?php if ($data) : ?>
                    <b>

                        <?php echo firstLetterToUp($data[1]["capital-name"]); ?>

                    </b>
                <?php endif; ?>
            <?php endif; ?>
        </p>
        <p>
            <?php if ($data) : ?>
                <?php echo $data[1]["flag"]; ?>
            <?php endif; ?>

        </p>
        <button type="submit">Valider</button>
    </form>
    <?php if (!$data) : ?>
        <p>
            <?= $err ?>
        </p>
    <?php endif ?>
</body>

</html>