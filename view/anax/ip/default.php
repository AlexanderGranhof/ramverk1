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
        width: 300px;
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
    <h1>IP Validator</h1>
    <p>The POST endpoint <code>/ip</code> will accept a json body with a single parameter such as: <code>"ip": "192.168.0.1"</code> and return a JSON response such as:</p>
    <div class="pre">
{
    "ip": "192.168.0.1",
    "hostname": "dlinkrouter",
    "valid": true
}
    </div>

    <p>Below is a simple test which will post the the controller handling the IP validation</p>
</div>

<h4>The two links below will test the API</h4>
<a style="display: block" target="_BLANK" href="./ip/test?ip=216.58.207.195">216.58.207.195</a>
<a style="display: block" target="_BLANK" href="./ip/test?ip=2a00:1450:400f:80b::2003">2a00:1450:400f:80b::2003</a>
<br>

<div class="form">
    <input id="ip" placeholder="192.168.0.1 ..." type="text">
    <button id="submit">Test ip</button>
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

        const response = await fetch("./ip", {
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