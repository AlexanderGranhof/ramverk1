<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "article";
if (isset($class)) {
    $classes[] = $class;
}


?>

<style>
    div.description {
        margin-bottom: 40px;
    }
    code,
    pre {
        padding: .2em .4em;
        margin: 0;
        font-size: 85%;
        background-color: rgba(27,31,35,.05);
        border-radius: 3px;
        font-family: SFMono-Regular,Consolas,Liberation Mono,Menlo,monospace;
    }

    .pre {
        font-family: SFMono-Regular,Consolas,Liberation Mono,Menlo,monospace;
        font-size: 85%;
        white-space: pre-wrap;
        background-color: rgba(27,31,35,.05);
        padding: 0 20px;
        width: fit-content;
        margin: 5px 0;
    }

    #result {
        min-width: fit-content;
        width: 600px;
    }

    p {
        margin: 0;
    }

    .form {
        width: 200px;
        display: grid;
        gap: 10px;
    }

    .form input {
        border: none;
        outline: none;
        padding: 5px 10px;
        border: 1px solid rgba(51, 51, 51, 0.25);
    }

    .form .pre {
        margin: 20px 0;
        padding: 10px 20px;
    }

    .form button {
        transition: all 80ms ease;
        border: none;
        outline: none;
        background-color: #1890ff;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .form button:hover {
        background-color: #40a9ff;
    }

    .form button:active {
       background-color: #1890ff;
    }
</style>

<div class="description">
    <h1>IP Geotagger</h1>
    <p>The POST endpoint <code>/geotagip</code> will accept a json body with a single parameter such as: <code>"ip": "134.201.250.155"</code> and return a JSON response such as:</p>
    <div class="pre">
{
    ip: "134.201.250.155",
    type: "ipv4",
    continent_code: "NA",
    continent_name: "North America",
    country_code: "US",
    country_name: "United States",
    region_code: "CA",
    region_name: "California",
    city: "Los Angeles",
    zip: "90012",
    latitude: 34.0655517578125,
    longitude: -118.24053955078125,
    location: {
        geoname_id: 5368361,
        capital: "Washington D.C.",
        languages: [
            {
                code: "en",
                name: "English",
                native: "English"
            }
        ],
        country_flag: "http://assets.ipstack.com/flags/us.svg",
        country_flag_emoji: "🇺🇸",
        country_flag_emoji_unicode: "U+1F1FA U+1F1F8",
        calling_code: "1",
        is_eu: false
    }
}
    </div>

    <p>Below is a simple test which will post to the controller handling the IP geotagging</p>
</div>

<?php

$client_ip = $_SERVER['REMOTE_ADDR'] ?? "::1";

?>

<h4>The two links below will test the API</h4>
<a style="display: block" target="_BLANK" href="./geotagip/test?ip=216.58.207.195">216.58.207.195</a>
<a style="display: block" target="_BLANK" href="./geotagip/test?ip=2a00:1450:400f:80b::2003">2a00:1450:400f:80b::2003</a>
<br>

<div class="form">
    <div class="input-container">
        <input id="ip" placeholder="192.168.0.1 ..." type="text" value="<?= $client_ip ?>">
        <button id="submit">Test ip</button>
    </div>
    <div class="pre" id="result">
result will show here...
    </div>
</div>

<script>
    const submit = document.getElementById("submit");
    const resultField = document.getElementById("result");
    const ipField = document.getElementById("ip");

    async function handleSubmit(event) {
        const data = {
            ip: ipField.value
        };

        const response = await fetch("./geotagip", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        const result = JSON.parse(await response.text());

        resultField.textContent = JSON.stringify(result, null, 4);
    }

    submit.addEventListener("click", handleSubmit);
</script>