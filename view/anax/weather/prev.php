<?php

namespace Anax\View;

// BTH
[$lat, $lng] = ["56.1806550", "15.5907000"];

$darksky = $di->get("darksky");

$showSingle = !!$di->request->getGet("single");
$ip = $di->request->getGet("ip");
$location = $di->request->getGet("location");

$time = $di->request->getGet("time");


if ($location) {
    [$lat, $lng] = explode(",", $location);
}

if ($time) {
    $time = date("Y-m-d", $time) . "T" . date("H:i:s", $time);
}

if ($showSingle) {
    if ($time) {
        $data = $darksky->today($lat, $lng, $time);
    } else {
        $data = $darksky->today($lat, $lng);
    }
}



$longdata = '[{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574955078,"summary":"Light Rain","icon":"rain","precipIntensity":0.699100000000000054711790653527714312076568603515625,"precipProbability":0.6999999999999999555910790149937383830547332763671875,"precipType":"rain","temperature":7.25,"apparentTemperature":4.79999999999999982236431605997495353221893310546875,"dewPoint":7.17999999999999971578290569595992565155029296875,"humidity":0.9899999999999999911182158029987476766109466552734375,"pressure":985.1000000000000227373675443232059478759765625,"windSpeed":3.689999999999999946709294817992486059665679931640625,"windGust":7.53000000000000024868995751603506505489349365234375,"windBearing":152,"cloudCover":1,"uvIndex":0,"visibility":4.34400000000000030553337637684307992458343505859375,"ozone":246.400000000000005684341886080801486968994140625},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574868678,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":6.07000000000000028421709430404007434844970703125,"apparentTemperature":6.1500000000000003552713678800500929355621337890625,"dewPoint":6.04000000000000003552713678800500929355621337890625,"humidity":1,"pressure":998.8999999999999772626324556767940521240234375,"windSpeed":1.0800000000000000710542735760100185871124267578125,"windGust":1.149999999999999911182158029987476766109466552734375,"windBearing":227,"cloudCover":0.79000000000000003552713678800500929355621337890625,"uvIndex":0,"visibility":4.76499999999999968025576890795491635799407958984375,"ozone":225},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574782278,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.044799999999999999544808559903685818426311016082763671875,"precipProbability":0.040000000000000000832667268468867405317723751068115234375,"precipType":"rain","temperature":5.0099999999999997868371792719699442386627197265625,"apparentTemperature":2.4199999999999999289457264239899814128875732421875,"dewPoint":4.980000000000000426325641456060111522674560546875,"humidity":1,"pressure":1007.200000000000045474735088646411895751953125,"windSpeed":3.140000000000000124344978758017532527446746826171875,"windGust":7.5,"windBearing":153,"cloudCover":0.8000000000000000444089209850062616169452667236328125,"uvIndex":0,"visibility":4.4290000000000002700062395888380706310272216796875,"ozone":249.900000000000005684341886080801486968994140625},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574695878,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":3.12999999999999989341858963598497211933135986328125,"apparentTemperature":1.5100000000000000088817841970012523233890533447265625,"dewPoint":0.8000000000000000444089209850062616169452667236328125,"humidity":0.84999999999999997779553950749686919152736663818359375,"pressure":1017.700000000000045474735088646411895751953125,"windSpeed":1.689999999999999946709294817992486059665679931640625,"windGust":2.04000000000000003552713678800500929355621337890625,"windBearing":197,"cloudCover":0.7800000000000000266453525910037569701671600341796875,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":259.69999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574609478,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.005599999999999999943101069987960727303288877010345458984375,"precipProbability":0.01000000000000000020816681711721685132943093776702880859375,"precipType":"rain","temperature":3.1699999999999999289457264239899814128875732421875,"apparentTemperature":0.64000000000000001332267629550187848508358001708984375,"dewPoint":-0.25,"humidity":0.7800000000000000266453525910037569701671600341796875,"pressure":1022.299999999999954525264911353588104248046875,"windSpeed":2.5800000000000000710542735760100185871124267578125,"windGust":3.79999999999999982236431605997495353221893310546875,"windBearing":112,"cloudCover":0.8000000000000000444089209850062616169452667236328125,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":252.599999999999994315658113919198513031005859375},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574523078,"summary":"Overcast","icon":"cloudy","precipIntensity":0.0275000000000000001387778780781445675529539585113525390625,"precipProbability":0.05000000000000000277555756156289135105907917022705078125,"precipType":"rain","temperature":3.899999999999999911182158029987476766109466552734375,"apparentTemperature":-0.13000000000000000444089209850062616169452667236328125,"dewPoint":1.8400000000000000799360577730112709105014801025390625,"humidity":0.85999999999999998667732370449812151491641998291015625,"pressure":1022.8999999999999772626324556767940521240234375,"windSpeed":5.160000000000000142108547152020037174224853515625,"windGust":6,"windBearing":114,"cloudCover":0.9699999999999999733546474089962430298328399658203125,"uvIndex":0,"visibility":9.8499999999999996447286321199499070644378662109375,"ozone":253.599999999999994315658113919198513031005859375},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574436678,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.136500000000000010214051826551440171897411346435546875,"precipProbability":0.270000000000000017763568394002504646778106689453125,"precipType":"rain","temperature":4.03000000000000024868995751603506505489349365234375,"apparentTemperature":-0.63000000000000000444089209850062616169452667236328125,"dewPoint":2.8300000000000000710542735760100185871124267578125,"humidity":0.92000000000000003996802888650563545525074005126953125,"pressure":1021.799999999999954525264911353588104248046875,"windSpeed":6.730000000000000426325641456060111522674560546875,"windGust":9.82000000000000028421709430404007434844970703125,"windBearing":125,"cloudCover":0.8000000000000000444089209850062616169452667236328125,"uvIndex":0,"visibility":8.69500000000000028421709430404007434844970703125,"ozone":250.69999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574350278,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.0315000000000000002220446049250313080847263336181640625,"precipProbability":0.040000000000000000832667268468867405317723751068115234375,"precipType":"rain","temperature":5.9199999999999999289457264239899814128875732421875,"apparentTemperature":2.37000000000000010658141036401502788066864013671875,"dewPoint":5.82000000000000028421709430404007434844970703125,"humidity":0.9899999999999999911182158029987476766109466552734375,"pressure":1024.90000000000009094947017729282379150390625,"windSpeed":5.30999999999999960920149533194489777088165283203125,"windGust":9.160000000000000142108547152020037174224853515625,"windBearing":110,"cloudCover":0.8000000000000000444089209850062616169452667236328125,"uvIndex":0,"visibility":8.916000000000000369482222595252096652984619140625,"ozone":240},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574263878,"summary":"Partly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":5.480000000000000426325641456060111522674560546875,"apparentTemperature":3.779999999999999804600747665972448885440826416015625,"dewPoint":5.2400000000000002131628207280300557613372802734375,"humidity":0.979999999999999982236431605997495353221893310546875,"pressure":1027.700000000000045474735088646411895751953125,"windSpeed":2.180000000000000159872115546022541821002960205078125,"windGust":6.410000000000000142108547152020037174224853515625,"windBearing":106,"cloudCover":0.419999999999999984456877655247808434069156646728515625,"uvIndex":0,"visibility":10.1199999999999992184029906638897955417633056640625,"ozone":253.30000000000001136868377216160297393798828125},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574177478,"summary":"Possible Drizzle","icon":"rain","precipIntensity":0.355499999999999982680520815847557969391345977783203125,"precipProbability":0.56999999999999995115018691649311222136020660400390625,"precipType":"rain","temperature":7.45000000000000017763568394002504646778106689453125,"apparentTemperature":4.21999999999999975131004248396493494510650634765625,"dewPoint":4.7599999999999997868371792719699442386627197265625,"humidity":0.82999999999999996003197111349436454474925994873046875,"pressure":1014,"windSpeed":5.46999999999999975131004248396493494510650634765625,"windGust":12.67999999999999971578290569595992565155029296875,"windBearing":154,"cloudCover":0.83999999999999996891375531049561686813831329345703125,"uvIndex":0,"visibility":8.18299999999999982946974341757595539093017578125,"ozone":281.80000000000001136868377216160297393798828125},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574091078,"summary":"Overcast","icon":"cloudy","precipIntensity":0.100800000000000000710542735760100185871124267578125,"precipProbability":0.13000000000000000444089209850062616169452667236328125,"precipType":"rain","temperature":8.21000000000000085265128291212022304534912109375,"apparentTemperature":5.12999999999999989341858963598497211933135986328125,"dewPoint":7.79999999999999982236431605997495353221893310546875,"humidity":0.9699999999999999733546474089962430298328399658203125,"pressure":1015.700000000000045474735088646411895751953125,"windSpeed":5.54000000000000003552713678800500929355621337890625,"windGust":11.4199999999999999289457264239899814128875732421875,"windBearing":95,"cloudCover":0.90000000000000002220446049250313080847263336181640625,"uvIndex":0,"visibility":6.19500000000000028421709430404007434844970703125,"ozone":262.1000000000000227373675443232059478759765625},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1574004678,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":7.5,"apparentTemperature":5.2599999999999997868371792719699442386627197265625,"dewPoint":5.6500000000000003552713678800500929355621337890625,"humidity":0.88000000000000000444089209850062616169452667236328125,"pressure":1016.8999999999999772626324556767940521240234375,"windSpeed":3.399999999999999911182158029987476766109466552734375,"windGust":9.7200000000000006394884621840901672840118408203125,"windBearing":202,"cloudCover":0.86999999999999999555910790149937383830547332763671875,"uvIndex":0,"visibility":10.0009999999999994457766661071218550205230712890625,"ozone":298.69999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573918278,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.03869999999999999829025654207725892774760723114013671875,"precipProbability":0.1600000000000000033306690738754696212708950042724609375,"precipType":"rain","temperature":6.79999999999999982236431605997495353221893310546875,"apparentTemperature":3.310000000000000053290705182007513940334320068359375,"dewPoint":4.95000000000000017763568394002504646778106689453125,"humidity":0.88000000000000000444089209850062616169452667236328125,"pressure":1012.1000000000000227373675443232059478759765625,"windSpeed":5.6699999999999999289457264239899814128875732421875,"windGust":11.7799999999999993605115378159098327159881591796875,"windBearing":89,"cloudCover":0.7800000000000000266453525910037569701671600341796875,"uvIndex":0,"visibility":9.657000000000000028421709430404007434844970703125,"ozone":284},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573831878,"summary":"Overcast","icon":"cloudy","precipIntensity":0.021600000000000001143529715363911236636340618133544921875,"precipProbability":0.08000000000000000166533453693773481063544750213623046875,"precipType":"rain","temperature":2.95000000000000017763568394002504646778106689453125,"apparentTemperature":0,"dewPoint":2.95000000000000017763568394002504646778106689453125,"humidity":1,"pressure":1024.700000000000045474735088646411895751953125,"windSpeed":3.04999999999999982236431605997495353221893310546875,"windGust":3.970000000000000195399252334027551114559173583984375,"windBearing":30,"cloudCover":1,"uvIndex":0,"visibility":2.069999999999999840127884453977458178997039794921875,"ozone":269.8999999999999772626324556767940521240234375},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573745478,"summary":"Possible Drizzle","icon":"rain","precipIntensity":0.2078000000000000124789067967867595143616199493408203125,"precipProbability":0.40000000000000002220446049250313080847263336181640625,"precipType":"rain","temperature":2.9199999999999999289457264239899814128875732421875,"apparentTemperature":1.479999999999999982236431605997495353221893310546875,"dewPoint":2.87999999999999989341858963598497211933135986328125,"humidity":1,"pressure":1011.5,"windSpeed":1.5800000000000000710542735760100185871124267578125,"windGust":2.310000000000000053290705182007513940334320068359375,"windBearing":239,"cloudCover":0.90000000000000002220446049250313080847263336181640625,"uvIndex":0,"visibility":9.8770000000000006679101716144941747188568115234375,"ozone":265.3999999999999772626324556767940521240234375},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573659078,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.0114999999999999998057109706905976054258644580841064453125,"precipProbability":0.11000000000000000055511151231257827021181583404541015625,"precipType":"rain","temperature":5.12000000000000010658141036401502788066864013671875,"apparentTemperature":5.12000000000000010658141036401502788066864013671875,"dewPoint":5.12000000000000010658141036401502788066864013671875,"humidity":1,"pressure":1003,"windSpeed":0.460000000000000019984014443252817727625370025634765625,"windGust":1.399999999999999911182158029987476766109466552734375,"windBearing":284,"cloudCover":0.7600000000000000088817841970012523233890533447265625,"uvIndex":0,"visibility":4.92699999999999960209606797434389591217041015625,"ozone":286.1000000000000227373675443232059478759765625},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573572678,"summary":"Possible Light Rain","icon":"rain","precipIntensity":0.653000000000000024868995751603506505489349365234375,"precipProbability":0.58999999999999996891375531049561686813831329345703125,"precipType":"rain","temperature":5.92999999999999971578290569595992565155029296875,"apparentTemperature":1.9899999999999999911182158029987476766109466552734375,"dewPoint":4.3499999999999996447286321199499070644378662109375,"humidity":0.90000000000000002220446049250313080847263336181640625,"pressure":1004.8999999999999772626324556767940521240234375,"windSpeed":6.21999999999999975131004248396493494510650634765625,"windGust":12.9000000000000003552713678800500929355621337890625,"windBearing":149,"cloudCover":0.7800000000000000266453525910037569701671600341796875,"uvIndex":0,"visibility":10.31099999999999994315658113919198513031005859375,"ozone":302.69999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573486278,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.06710000000000000686117829218346741981804370880126953125,"precipProbability":0.11999999999999999555910790149937383830547332763671875,"precipType":"rain","temperature":2.810000000000000053290705182007513940334320068359375,"apparentTemperature":-0.2399999999999999911182158029987476766109466552734375,"dewPoint":2.189999999999999946709294817992486059665679931640625,"humidity":0.95999999999999996447286321199499070644378662109375,"pressure":1010.6000000000000227373675443232059478759765625,"windSpeed":3.160000000000000142108547152020037174224853515625,"windGust":7.38999999999999968025576890795491635799407958984375,"windBearing":135,"cloudCover":0.7800000000000000266453525910037569701671600341796875,"uvIndex":0,"visibility":14.0220000000000002415845301584340631961822509765625,"ozone":295.3999999999999772626324556767940521240234375},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573399878,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.0572000000000000008437694987151189707219600677490234375,"precipProbability":0.070000000000000006661338147750939242541790008544921875,"precipType":"snow","precipAccumulation":0.062300000000000001210143096841420629061758518218994140625,"temperature":-1.100000000000000088817841970012523233890533447265625,"apparentTemperature":-6.8300000000000000710542735760100185871124267578125,"dewPoint":-1.87999999999999989341858963598497211933135986328125,"humidity":0.939999999999999946709294817992486059665679931640625,"pressure":1011.700000000000045474735088646411895751953125,"windSpeed":5.96999999999999975131004248396493494510650634765625,"windGust":9.4900000000000002131628207280300557613372802734375,"windBearing":303,"cloudCover":0.7399999999999999911182158029987476766109466552734375,"uvIndex":0,"visibility":6.66199999999999992184029906638897955417633056640625,"ozone":307.6000000000000227373675443232059478759765625},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573313478,"summary":"Possible Drizzle","icon":"rain","precipIntensity":0.35189999999999999058530875117867253720760345458984375,"precipProbability":0.5,"precipType":"rain","temperature":3.2599999999999997868371792719699442386627197265625,"apparentTemperature":-0.289999999999999980015985556747182272374629974365234375,"dewPoint":3.2599999999999997868371792719699442386627197265625,"humidity":1,"pressure":1007.5,"windSpeed":4.0099999999999997868371792719699442386627197265625,"windGust":9.3699999999999992184029906638897955417633056640625,"windBearing":17,"cloudCover":0.7800000000000000266453525910037569701671600341796875,"uvIndex":0,"visibility":12.9049999999999993605115378159098327159881591796875,"ozone":288},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573227078,"summary":"Possible Light Rain","icon":"rain","precipIntensity":0.490499999999999991562305012848810292780399322509765625,"precipProbability":0.56999999999999995115018691649311222136020660400390625,"precipType":"rain","temperature":6.11000000000000031974423109204508364200592041015625,"apparentTemperature":3.29999999999999982236431605997495353221893310546875,"dewPoint":5.3300000000000000710542735760100185871124267578125,"humidity":0.9499999999999999555910790149937383830547332763671875,"pressure":1010,"windSpeed":3.850000000000000088817841970012523233890533447265625,"windGust":9.410000000000000142108547152020037174224853515625,"windBearing":103,"cloudCover":0.8000000000000000444089209850062616169452667236328125,"uvIndex":0,"visibility":9.327999999999999403144101961515843868255615234375,"ozone":301.19999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573140678,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.03690000000000000224265050974281621165573596954345703125,"precipProbability":0.13000000000000000444089209850062616169452667236328125,"precipType":"rain","temperature":2.339999999999999857891452847979962825775146484375,"apparentTemperature":-0.40000000000000002220446049250313080847263336181640625,"dewPoint":1.2600000000000000088817841970012523233890533447265625,"humidity":0.93000000000000004884981308350688777863979339599609375,"pressure":1007.8999999999999772626324556767940521240234375,"windSpeed":2.660000000000000142108547152020037174224853515625,"windGust":5.7599999999999997868371792719699442386627197265625,"windBearing":12,"cloudCover":0.7399999999999999911182158029987476766109466552734375,"uvIndex":0,"visibility":15.4199999999999999289457264239899814128875732421875,"ozone":266.80000000000001136868377216160297393798828125},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1573054278,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":1.8400000000000000799360577730112709105014801025390625,"apparentTemperature":-2.25,"dewPoint":-6.04999999999999982236431605997495353221893310546875,"humidity":0.560000000000000053290705182007513940334320068359375,"pressure":1002.3999999999999772626324556767940521240234375,"windSpeed":4.3499999999999996447286321199499070644378662109375,"windGust":9.8800000000000007815970093361102044582366943359375,"windBearing":24,"cloudCover":0.7399999999999999911182158029987476766109466552734375,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":281.3999999999999772626324556767940521240234375},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1572967878,"summary":"Overcast","icon":"cloudy","precipIntensity":0,"precipProbability":0,"temperature":1.62999999999999989341858963598497211933135986328125,"apparentTemperature":-3.149999999999999911182158029987476766109466552734375,"dewPoint":-2.5,"humidity":0.7399999999999999911182158029987476766109466552734375,"pressure":1001.6000000000000227373675443232059478759765625,"windSpeed":5.5099999999999997868371792719699442386627197265625,"windGust":12.019999999999999573674358543939888477325439453125,"windBearing":5,"cloudCover":0.90000000000000002220446049250313080847263336181640625,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":288.19999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1572881478,"summary":"Partly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":2.819999999999999840127884453977458178997039794921875,"apparentTemperature":-0.88000000000000000444089209850062616169452667236328125,"dewPoint":-4.12999999999999989341858963598497211933135986328125,"humidity":0.59999999999999997779553950749686919152736663818359375,"pressure":1001,"windSpeed":4.089999999999999857891452847979962825775146484375,"windGust":10.769999999999999573674358543939888477325439453125,"windBearing":27,"cloudCover":0.34999999999999997779553950749686919152736663818359375,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":313.5},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1572795078,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":3.87000000000000010658141036401502788066864013671875,"apparentTemperature":0.330000000000000015543122344752191565930843353271484375,"dewPoint":1.04000000000000003552713678800500929355621337890625,"humidity":0.81999999999999995115018691649311222136020660400390625,"pressure":997.6000000000000227373675443232059478759765625,"windSpeed":4.25,"windGust":7.57000000000000028421709430404007434844970703125,"windBearing":22,"cloudCover":0.75,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":287.19999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1572708678,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0.041399999999999999300559494486151379533112049102783203125,"precipProbability":0.1600000000000000033306690738754696212708950042724609375,"precipType":"rain","temperature":6.04999999999999982236431605997495353221893310546875,"apparentTemperature":5.29999999999999982236431605997495353221893310546875,"dewPoint":6.04999999999999982236431605997495353221893310546875,"humidity":1,"pressure":993,"windSpeed":1.37999999999999989341858963598497211933135986328125,"windGust":2.45999999999999996447286321199499070644378662109375,"windBearing":13,"cloudCover":0.86999999999999999555910790149937383830547332763671875,"uvIndex":0,"visibility":2.513999999999999790389892950770445168018341064453125,"ozone":284.1000000000000227373675443232059478759765625},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1572622278,"summary":"Mostly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":3.45000000000000017763568394002504646778106689453125,"apparentTemperature":1.1699999999999999289457264239899814128875732421875,"dewPoint":3,"humidity":0.9699999999999999733546474089962430298328399658203125,"pressure":1011.700000000000045474735088646411895751953125,"windSpeed":2.37999999999999989341858963598497211933135986328125,"windGust":5.42999999999999971578290569595992565155029296875,"windBearing":181,"cloudCover":0.68000000000000004884981308350688777863979339599609375,"uvIndex":0,"visibility":9.888999999999999346300683100707828998565673828125,"ozone":286},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1572535878,"summary":"Clear","icon":"clear-night","precipIntensity":0,"precipProbability":0,"temperature":5.07000000000000028421709430404007434844970703125,"apparentTemperature":2.5800000000000000710542735760100185871124267578125,"dewPoint":0.6999999999999999555910790149937383830547332763671875,"humidity":0.729999999999999982236431605997495353221893310546875,"pressure":1018.3999999999999772626324556767940521240234375,"windSpeed":3.020000000000000017763568394002504646778106689453125,"windGust":8,"windBearing":258,"cloudCover":0,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":302.69999999999998863131622783839702606201171875},"offset":1},{"latitude":59.3067512512210015529490192420780658721923828125,"longitude":18.078559875488000585619374760426580905914306640625,"timezone":"Europe\/Stockholm","currently":{"time":1572449478,"summary":"Partly Cloudy","icon":"partly-cloudy-night","precipIntensity":0,"precipProbability":0,"temperature":2.279999999999999804600747665972448885440826416015625,"apparentTemperature":-0.419999999999999984456877655247808434069156646728515625,"dewPoint":-0.429999999999999993338661852249060757458209991455078125,"humidity":0.81999999999999995115018691649311222136020660400390625,"pressure":1023.6000000000000227373675443232059478759765625,"windSpeed":2.609999999999999875655021241982467472553253173828125,"windGust":7.11000000000000031974423109204508364200592041015625,"windBearing":222,"cloudCover":0.57999999999999996003197111349436454474925994873046875,"uvIndex":0,"visibility":10.0030000000000001136868377216160297393798828125,"ozone":281.80000000000001136868377216160297393798828125},"offset":1}]';
// var_dump($longdata);

if (!$showSingle) {
    $longdata = json_decode($darksky->past_30_days($lat, $lng));
    // $longdata = json_decode($longdata);
}


// var_dump($longdata);
?>
<?php if ($showSingle): ?>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />

    <div class="header">
        <h1 class="temp"><?= $data->currently->temperature ?>°C</h1>
        <p class="summary"><?= $data->currently->summary?></p>
        <p class="date"><?= date("y-m-d") ?></p>
    </div>

    <div id='map' style='width: 100%; height: 400px;'></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYnRoZ3JhbmhvZiIsImEiOiJjazNrN2puMnMwMGJ3M2NwaHk2NHZvNGR4In0.goBp0a2fzSu0NACUN6PJoA';
        new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [<?= $lng ?>, <?= $lat ?>], // starting position [lng, lat]
            zoom: 13 // starting zoom
        });
    </script>

            <?php foreach($data->currently as $key => $val): ?>

            <?php endforeach; ?>

    <div class="table">
        <div>
            <?php foreach($data->currently as $key => $val): ?>
                <p><?= $key ?></p>
            <?php endforeach; ?>
        </div>
        <div>
            <?php foreach($data->currently as $key => $val): ?>
                <p><?= $val ?></p>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <form style="margin: 20px auto;" action="./test" method="GET">
    <label style="display: block;" for="location">Location:</label>
        <input style="width: 230px" type="text" placeholder="56.180494,15.590641" name="location" id="location" value="56.180494,15.590641" >
        <input type="submit" value="Change Location">
    </form>
    <?php $data = $longdata ?>
    <div class="past-table">
        <div class="past-row headers">
            <p>Date</p>
            <p>Temperature</p>
            <p>Summary</p>
        </div>
        <?php foreach ($data as $row): ?>
            <div class="past-row">
                <?php //var_dump($row) ?>
                <a target="_BLANK" href="?single=true&location=<?= $row->latitude ?>,<?= $row->longitude ?>&time=<?= $row->currently->time ?>">
                    <p><?= date("Y-m-d", $row->currently->time); ?></p>
                    <p><?= $row->currently->temperature ?>°C</p>
                    <p><?= $row->currently->summary ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<style>
    div.past-table {
        display: grid;
    }

    div.past-row p {
        margin: 0;
    }

    div.past-row a,
    div.past-row.headers {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        margin: 0;
    }

    div.past-row.headers p {
        font-weight: bold;
    }

    p.date {
        margin: 0;
        text-align: center;
        color: #222;
        opacity: 0.5;
    }
    div.header {
        margin: 20px 0;
    }

    h1.temp {
        width: 100%;
        text-align: center;
        font-weight: lighter;
        font-size: 4em;
        margin: 0;
        color: #222;
        opacity: 0.85;
    }

    p.summary {
        text-align: center;
        text-transform: uppercase;
        margin: 0;
        font-weight: bold;
        color: #222;
        opacity: 0.6;
    }

    div.table {
        margin: 20px auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        column-gap: 20px;
    }

    div.table div:first-child {
        place-self: flex-end;
    }

    div.table div:first-child p {
        margin-right: 10px;
        text-transform: capitalize;
        font-weight: bold;
    }

    div.table div:first-child p::after {
        content: ":";
    }
</style>