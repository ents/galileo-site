<div class="container" style="position: relative; top: -20px; width: 90%">
    <input placeholder = "type here" class=hidden value="AD-LINE.BIZ - BUY ADS ONLINE">
    <div class="line" id="l1">
        <div class="line_text" style="margin-top -5px;"></div>
        <div class="line_cover"></div>
    </div>
</div>
<script>
    jQuery(function(){
        jQuery('input').keyup(function(){ jQuery(this).next().find('.line_text').html(this.value)}).keyup();
    })
</script>

<style>
    html, body {
        margin: 0px;
        padding:30px 0;
        width:100%;
        height:100%;
        font-family: Arial;
        text-align:center;
    }

    .container{
        width:500px;
        margin: 0 auto;
    }

    input.hidden{
        test-align:center;
        width:500%;
        height:24px;
        font-size:17px;
        text-align:center;
        display: none;
    }

    /****** Lines *******/

    .line {
        overflow:hidden;
        width:100%;
        border:2px solid #dddddd;
        box-shadow:0px 5px 5px 3px rgba(0,0,0,0.3);
        display:block;
        margin-top:10px;
        border-radius:2px;
        position:relative;
    }

    .line .line_cover{
        width:100%;
        height:100%;
        position:absolute;
        z-index:2;
        background:url(http://html5.by/wp-content/demo/led_bg.png);
    }

    .line .line_text{
        width:100%;
        height:100%;
        position:absolute;
        z-index:1;
        margin-top: -5px;
    }

    /****** Line 1 *******/

    #l1.line{
        height:45px;
        background:rgb(80,80,80);
    }

    #l1.line .line_text{
        font-size:48px;
        font-weight:bold;
        color:red;
        -webkit-animation: l1_animation 10s linear infinite;
        -moz-animation: l1_animation 10s linear infinite;
    }

    @-webkit-keyframes l1_animation {
        0%{left:100%;}
        100%{left:-100%;}
    }
    @-moz-keyframes l1_animation {
        0%{left:100%;}
        100%{left:-100%;}
    }

    /****** Line 2 *******/

    #l2.line{
        height:70px;
        background:rgb(90,60,50);
    }

    #l2.line .line_text{
        font-size:60px;;
        position:absolute;
        color:#ffb400;
        font-weight:bold;
        -webkit-animation: l2_animation 5s linear infinite;
        -moz-animation: l2_animation 5s linear infinite;
    }

    @-webkit-keyframes l2_animation {
        0%   { opacity: 0; }
        50% { opacity: 1; }
        100% { opacity: 0; }
    }

    @-moz-keyframes l2_animation {
        0%   { opacity: 0; }
        50% { opacity: 1; }
        100% { opacity: 0; }
    }

    /****** Line 3 *******/

    #l3.line{
        height:70px;
        background:rgb(90,90,90);
    }

    #l3.line .line_text{
        font-size:60px;;
        position:absolute;
        color:#ffb400;
        font-weight:bold;
        font-family:"Trebuchet MS", Helvetica, sans-serif;
        -webkit-animation: l3_animation 5s linear infinite;
        -moz-animation: l3_animation 5s linear infinite;
    }

    @-webkit-keyframes l3_animation {
        0%    {color: rgb(0,0,255); }
        20%   {color: rgb(0,255,255); }
        40%   {color: rgb(255,0,0); }
        60%   {color: rgb(255,255,0); }
        80%   {color: rgb(255,255,255); }
        100%  {color: rgb(0,0,255); }
    }

    @-moz-keyframes l3_animation {
        0%    {color: rgb(0,0,255); }
        20%   {color: rgb(0,255,255); }
        40%   {color: rgb(255,0,0); }
        60%   {color: rgb(255,255,0); }
        80%   {color: rgb(255,255,255); }
        100%  {color: rgb(0,0,255); }
    }

</style>