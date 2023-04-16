@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/loading-bar.css"/>
<script type="text/javascript" src="js/loading-bar.js"></script>



<style>

html { height: 7030px; overflow-y:auto; overflow-x: hidden  }
   /* body {height: 100%;}*/
main {
    position: absolute;
    top:18px;
}
 .navbar-toggler {
    position: fixed;
    top:30px;
    left:30px;
 }
.ldBar-label {
    display:none;
}
    #puntiContainer {
        width: 100%;
    color: #fff;
    text-align: center;
    height: 155px;
    line-height: 155px;
    position: fixed;
    top: 50px;
    left:0px;
    font-size: 20px;
    font-weight: 600;
    background-image: url('/images/circle.svg');
    background-position: center center;
    background-repeat: no-repeat;   
    }


    .premio-container {
        min-width:350px;
        max-width:450px;
        height: 400px;
        position: absolute;
        left:45%;
    }
    .premio-photo {
        width: 100%;
        height: 65%;
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center center;
    }

    .scoiattoloContainer {
        top:1890px;
    }
    .scoiattolo-photo {
        background-image: url(/images/scoiattolo.png);
    }

    .coniglioContainer {
        top:2700px;
    }
    .coniglio-photo {
        background-image: url(/images/coniglio.png);
    }

    .pinguContainer {
        top:3510px;
    }
    .pingu-photo {
        background-image: url(/images/pingu.png);
    }

    .linoContainer {
        top:4560px;
    }
    .lino-photo {
        background-image: url(/images/lino.png);
    }

    .tigreContainer {
        top:5900px;
    }
    .tigre-photo {
        background-image: url(/images/tigre.png);
    }

   

</style>


    <div class="ldBar mx-auto" data-value="{{\App\Models\Stat::totalePuntiGiocatore(Auth::user()->id) * 100 / 5900}}"
    data-type="fill"
    style="width:auto;"
    data-fill-background-extrude="5"
    data-fill-background="#fff"
    data-fill-dir="ttb"
    data-img="/images/stage-5900.svg"
  ></div>


<input type="hidden" id="totPunti" value="{{\App\Models\Stat::totalePuntiGiocatore(Auth::user()->id)}}">
<div class="punti" id="puntiContainer">{{\App\Models\Stat::totalePuntiGiocatore(Auth::user()->id)}}</div>


{{--Scoiattolo--}}
<div class="premio-container scoiattoloContainer">
    <div class="premio-photo scoiattolo-photo" id="scoiattolo">

    </div>
</div>


{{--CONIGLIO--}}
<div class="premio-container coniglioContainer">
    <div class="premio-photo coniglio-photo" id="coniglio">

    </div>
</div>


{{--PINGU--}}
<div class="premio-container pinguContainer">
    <div class="premio-photo pingu-photo" id="pingu">

    </div>
</div>


{{--LINO--}}
<div class="premio-container linoContainer">
    <div class="premio-photo lino-photo" id="lino">

    </div>
</div>

{{--TIGRE--}}
<div class="premio-container tigreContainer">
    <div class="premio-photo tigre-photo" id="tigre">

    </div>
</div>



<script>

var totPunti = document.getElementById('totPunti').value;
var element = document.getElementById('puntiContainer');

console.log(totPunti * 100 / 5900);




if(totPunti >= 1890) {
    document.getElementById("scoiattolo").style.opacity = "0.5";;
}

if(totPunti >= 2700) {
    document.getElementById("coniglio").style.opacity = "0.5";;
}

if(totPunti >= 3510) {
    document.getElementById("pingu").style.opacity = "0.5";;
}

if(totPunti >= 4560) {
    document.getElementById("lino").style.opacity = "0.5";;
}

if(totPunti >= 5900) {
    document.getElementById("tigre").style.opacity = "0.5";;
}


function Scrolldown() {
   if(totPunti > 5900) {
    totPunti = 5900; // non srolla oltre il massimo
   }
    window.scrollTo(0, totPunti- 50 -33); // punti + pos absolut top:50px - 33px(per grafica)
}

window.onload = Scrolldown;

</script>
@endsection