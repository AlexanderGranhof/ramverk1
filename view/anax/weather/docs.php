<h1>Weather Forecast and history</h1>

<p><b>Tests:</b></p>
<ul>
    <li>
        <a target="_BLANK" href="./weather/test">History of the past 30 days (default location is BTH)</a>
    </li>
    <li>
        <a target="_BLANK" href="./weather/custom?location=56.1806550,15.5907000">Returns a weeks forecast</a>
    </li>
    <li>
        <a target="_BLANK" href="./weather/custom?location=56.1806550,15.5907000&prev=true">Returns a 30 days of weather history</a>
    </li>
</ul>

<p>To use this API you can post to the <code>/weather</code> route. The API takes 3 JSON body parameters as below:</p>
<div class="pre">
{
    "location": "56.1806550,15.5907000",
    "ip": "192.168.0.1"
    "prev": true
}

</div>

<p>The api will use the location of either the <code>location</code> parameter or the <code>ip</code> parameter. Do not pass both.</p>
<p>If you do not pass the <code>prev</code> parameter it will show the forecast of the current week. You can pass this as true to show the past 30 days</p>


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